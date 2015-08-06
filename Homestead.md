# Dan's guide to adding a Homestead VM to your project
I'm always on the lookout for great ways to answer the question "How do I get started in PHP?"  Sometimes, the hardest part is figuring out the server side of it, and everything you need to build something.

Homestead is a pre-configured, virtual server in a box.  Easy to add to your project and has probably more services than you need but things you maybe haven't tried because you didn't know how to install them.

It is not a replacement for tools like Ansible|Chef|Puppet or even Docker--you can use those tools to script building not only your dev VM, but testing and production servers as well.  But if you are looking for a quick way to add a dev VM to your project, or don't yet know the difference between Postfix and clearfix--those bigger tools can wait.

## PreRequisites
Install
  * [VirtualBox]
  * [Vagrant]
  * Maybe browse the [Homestead full Setup Guide][Homestead]

Remember, everything you read is probably going to be about the way Homestead was origionally designed.  You would have one VM, and just keep addings sites and projects to it.  

When they added the option to set up a VM per project, that's when I got very excited.

## Given an exiting Project
Lets take our existing project and setup Homestead 

```bash
git clone git@github.com:kcphpug/WeatherService.git WeatherService
```

Now, normally we run that with a local php, right?
```
cd WeatherService/public
php -S 127.0.0.1:8080
```
## Add laravel/homestead to your composer.json file (automatically)

```bash
composer require laravel/homestead -dev
```

## Have Homestead Make your Vagrantfile

```bash
vendor/bin/homestead make
```

## Clean up Homestead.yaml
I personally like all my VM's under 192.168.56.*  I really don't remember why at this point. 

Notice the hostname and name are already done for you. You can customize to weather.dev for example.

Whatever "ip" and "hostname" are, add a line to /etc/hosts 

```bash
vim /etc/hosts
```
for example...
```
  192.168.56.88   weatherservice.dev
```

## Start it up!
vagrant up

## Connect to your site!
```
vagrant ssh
```
Point a browser at:
http://weatherservice.dev

No more ugly port numbers!

## Connect MySQL Workbench to your site!
Homestead will make you a local port, but I prefer connecting to the IP directly.

MySQL Worksench (and PHPStorm 9) lets you connect to mysql over an ssh tunnel:

  ssh hostname: 192.168.56.88
  ssh username: vagrant
  ssh password: secret
  mysql hostname: 127.0.0.1
  mysql Server Port: 3306
  mysql Username: homestead
  mysql password: secret


## Add some quick extra setup script
```bash
vim after.sh
```
```
apt-get install htop
echo "Done installing extras
```
```bash
vagrant provision
```
## Delete your VM, etc
```
vagrant destroy
```
Remember, if you are just looking to shut it down, just do:
```
vagrant halt
```

## Check in your VM and push
```
vim .gitignore
```
```
.vagrant
```  
```  
git status
git add .
git commit -m "Adding the Homestead VM to my project"
git push
```

### References
[VirtualBox]: https://www.virtualbox.org/wiki/Downloads
[Vagrant]: http://www.vagrantup.com/downloads.html
[Homestead]: http://laravel.com/docs/5.1/homestead
