# -*- mode: ruby -*-
Vagrant.configure("2") do |config|
  config.vm.box = "centos/7"

  nodes = [
    { name: 'proxy01', ip: '192.168.50.11' },
    { name: 'proxy02', ip: '192.168.50.12' },
    { name: 'app01', ip: '192.168.50.21' },
    { name: 'app02', ip: '192.168.50.22' },
    { name: 'db01', ip: '192.168.50.31' },
  ]

  roles = [
    { name: 'proxy', cpu: 1, memory: 256  },
    { name: 'app',   cpu: 2, memory: 512  },
    { name: 'db',    cpu: 2, memory: 1024 },
  ]

  nodes.each do |n|
    config.vm.define n[:name] do |c|
      c.vm.network :private_network, ip: n[:ip]
      c.vm.hostname = n[:name]
      config.vm.synced_folder "html/", "/vagrant/html", nfs: true

      c.vm.provider :virtualbox do |vbox|
        rp = roles.find { |r| r[:name] == n[:name].gsub(/[0-9]/, '') }
        vbox.customize ["modifyvm", :id, "--memory", rp[:memory]]
        vbox.customize ["modifyvm", :id, "--cpus", rp[:cpu]]

#        c.vm.provision :itamae do |itamae|
#          itamae.sudo = true
#          itamae.recipes = ['./bootstrap.rb']
#          itamae.json = "./nodes/development_#{rp[:name]}.json"
#        end
      end
    end
  end
end
