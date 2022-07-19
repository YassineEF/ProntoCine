# ProntoCine

I built this project to refactor my old project ADDICINE, both site have the same HTML/CSS i didn't change anything because i want to focus myself on learning MVC pattern, i learn how to work with an API pretty easly.
Learn the MVC model was a little bit harder but in the end i learn what does it work and how to write it, i need more practice but i can do it.

# Why i used cURL

To build this project i used CURL to download data and wich can communicate with an API, i used CURL cause i want to privilage PHP over Javascript and that's why i don't used Axios/ajax/fetch.
In my Controllers i have all the data i get from curling from the API and i render the view.
In my Model i have my class to initiate curl and return trhe data.
In my views i have all my templates to show what i returned in my controllers.

# How to install & run the Project

Step 1:
Download the project, create a .env file in the views table and write into it your API key.
Step 2:
Donwload the SSL certificate from the API site and put it in the models folder.
Step 3:
Now if you have XAMPP or WAMP you need to put it on www folder and go on your localhost and search for http://localhost/ProntoCine/Movies
Step 4:
If you want change the style you need to download node and then run the command to run sass and change the scss file.
