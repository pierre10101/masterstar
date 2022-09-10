# Approach

- I decided to use Laravel Sail with docker for this project. 
- In order to get setup the installation of docker is crucial.
- once you have all dependencies installed run the.
- With the latest laravel installation I did run into issues with docker. The solution was to install the latest version of docker and it fixed it. 

# Architecture
- For the frontend instead of using Vue I decided to see how alpinejs and tailwindcss would work with simple blade templates. 
- I decided to include all the default deployment options instead of including just what is required. 
- The makefile contains yarn but npm would work just as well. 

# URls
- After running a make dev successfully the app should be available at localhost