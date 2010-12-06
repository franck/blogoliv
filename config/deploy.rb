#require "vendor/plugins/thinking-sphinx/lib/thinking_sphinx/deploy/capistrano.rb"

# multi-staging
# command : cap staging deploy
set :stages, %w(staging production)
set :default_stage, "production"
#require 'capistrano/ext/multistage'

set :application, "blogoliv"
set :deploy_in, "/home/blogoliv/blogoliv.com"

set :hostname, "blogoliv.com"
role :app, "#{hostname}"
role :web, "#{hostname}"
role :db, "#{hostname}", :primary => true

set :scm, :git
set :repository, "git@github.com:franck/#{application}.git"
#set :repository, "git@github.com:franck/expertnetwork.git"
set :branch, "master"
set :deploy_via, :remote_cache

#ssh_options[:port] = 32100
set :user, "blogoliv"
set :admin_runner, "blogoliv"

set :use_sudo, false
set :keep_releases, 2
set :git_shallow_clone, 1

#set :rake, "/opt/ruby-enterprise/bin/rake"

task :production do
  set :deploy_to, "#{deploy_in}/#{application}/app"
  set :env, "production"
  # Deploy to production site only from stable branch
  set :branch, "stable"
end

task :staging do
  set :deploy_to, "#{deploy_in}/#{application}/staging"
  set :env, "staging"
end


namespace :deploy do
  desc "Overwriting restart"
  task :restart, :roles => :app, :except => { :no_release => true } do
  end
  
  desc "Add uploads folder"
  task :shared_uploads_folder, :roles => :web do
    run "mkdir -p #{shared_path}/uploads"
    run "chown -R #{user} #{shared_path}/uploads"
    run "chmod 755 #{shared_path}/uploads"
  end
  
  desc "Symlink uploads folder"
  task :symlink_uploads, :roles => :web do
    run "ln -nfs #{shared_path}/uploads #{current_path}/public/wp-content"
  end
  
  desc "Symlink config files"
  task :symlink_config_files, :roles => :web do
    run "ln -nfs #{current_path}/config/wp-config.php #{current_path}/public/wp-config.php"
    run "ln -nfs #{current_path}/config/htaccess.txt #{current_path}/public/.htaccess"
  end

  
  desc <<-DESC
  A macro-task that updates the code and fixes the symlink.
  DESC
  task :default do
    transaction do
      update_code
      symlink
    end
  end

  task :update_code, :except => { :no_release => true } do
    on_rollback { run "rm -rf #{release_path}; true" }
    strategy.deploy!
  end
  
end

after "deploy:setup", "deploy:shared_uploads_folder"
after "deploy:symlink", "deploy:symlink_uploads"
after "deploy", "deploy:symlink_config_files"
#after "deploy", "deploy:cleanup"
