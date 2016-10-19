# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.vm.box = "centos/7"

  config.vm.define :proxy01 do |c|
    c.vm.hostname = "wdp4.com"
    c.vm.network "private_network", ip: "192.168.50.11"
#    c.vm.synced_folder "../data", "/vagrant_data"

    c.vm.provider "virtualbox" do |vb|
      vb.memory = "1024"
      vb.cpus = "1"
    end

    c.vm.provision :itamae do |itamae|
      itamae.sudo = true
      itamae.recipes = ['./cookbooks/mysql/default.rb']
    end
  end

end
