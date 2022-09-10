# Approach

- I decided to use Laravel Sail with docker for this project. 
- In order to get setup the installation of docker is crucial.
- once you have all dependencies installed run the.
- With the latest laravel installation I did run into issues with docker. The solution was to install the latest version of docker and it fixed it. 
- To start the project first run make setup - This will install sail which is required to run the project.

# Architecture
- For the frontend instead of using Vue I decided to see how alpinejs and tailwindcss would work with simple blade templates. 
- I decided to include all the default deployment options instead of including just what is required. 
- The makefile contains yarn but npm would work just as well. 

# URls
- After running a make dev successfully the app should be available at localhost

# Note
- My assumption was that the request was to create an example of the factory pattern and to allow the app to easily switch between dependendencies. I therefore did not use the IoC container to dynamically resolve dependencies. 
- I decided to use a singleton pattern with the factory otherwise each request would effectively create a new instantiation in memory. Assumption is that the providers will stay stateless. 

#setup instructions

- Copy the .env.example and rename file to .env
- Run the make setup command
- Run the make dev command
- if a error pops up, it should not, regarding the encryption key, generate one for your app by clicking on the botton