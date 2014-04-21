# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"
  config.vm.provision :shell, :path => "vagrant.sh"

  #config.vm.network :forwarded_port, host: 80, guest: 80
  config.vm.network :forwarded_port, host: 8181, guest: 80
  config.vm.network :private_network, ip: "192.168.50.5"

  config.vm.synced_folder ".", "/var/www/laravel", {:mount_options => ['dmode=777','fmode=777']}

  config.vm.hostname = "laravel-bootstrap"

  # If true, then any SSH connections made will enable agent forwarding.
  # Default value: false
  config.ssh.forward_agent = true

  config.vm.provider :virtualbox do |vb|
    vb.name = "Laravel Bootstrap"
    vb.customize ["modifyvm", :id, "--memory", "512"]
    vb.customize ["modifyvm", :id, "--ostype", "Ubuntu_64"]
  end

  config.vm.provision :shell, :path => "vagrant.sh"

end