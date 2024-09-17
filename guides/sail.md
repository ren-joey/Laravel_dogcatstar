# About Laravel Sail
Make sure that your windows installed WSL and Ubuntu.
Follow the [official guides](https://laravel.com/docs/11.x/sail) to install Laravel Sail, if you encounter any unexpected, you may try the steps below to address the problems.

Check if Ubuntu is installed:
```bash
wsl --list --verbose
#   NAME              STATE           VERSION
# * Ubuntu            Running         2
#   docker-desktop    Running         2
```
If Ubuntu doesn't show up in the list, you can install it by:
```bash
wsl --install -d Ubuntu
wsl --set-default Ubuntu
```
Then you can use `bash` command to log into the Ubuntu terminal:
```bash
bash
```
Use the following command to run Laravel Sail
```bash
./vendor/bin/sail up --build -d
```
Set a command alias to facilitate the developing process
```bash
alias sail='sh $([ -f sail ] && echo sail || echo vendor/bin/sail)'
```
After the setting, you may manipulate Laravel easily by:
```bash
sail up --build -d
```
First start operations:
```bash
sail artisan migrate
sail artisan key:generate
```
Once you finish works, remember to stop and remove the container to release your data storage.
```bash
sail down -v
```
To clear the cache:
```bash
sail artisan config:clear
sail artisan cache:clear
```