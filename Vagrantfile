# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |config|
  config.vm.box_version = ">= 0.1.0"
  config.vm.box = "rasmus/php7dev"
  config.vm.box_check_update = true
  config.vm.box_url = "https://atlas.hashicorp.com/rasmus/php7dev"

  config.vm.network "private_network", ip: "69.0.0.50"

  config.vm.synced_folder ".", "/var/www", type: "nfs"

  # plugin conflict
  if Vagrant.has_plugin?("vagrant-vbguest") then
    config.vbguest.auto_update = false
  end

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "2048"
    vb.cpus = 4
    vb.name = "framework.dev"
    vb.check_guest_additions = false
    vb.functional_vboxsf     = false
  end

  config.ssh.insert_key = false

  config.vm.provision "Fix for 'stdin: is not a tty'", type: "shell" do |s|
    s.inline = "sed -i '/tty/!s/mesg n/tty -s \\&\\& mesg n/' /root/.profile"
  end

end
