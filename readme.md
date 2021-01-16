# About Website
The website of the Pariwista Service of East Kalimantan Province is a website that contains things related to tourism in East Kalimantan. There is a website display, including the home menu, profiles, photos, videos, public information, 3A data, pokdarwis Dewa Wisata, and contact. Features on the admin side include the inbox menu, website menu, gallery, posts, breaking news posts, page lists, and social media.
you can visit website [in here](http://dispar.kaltimprov.go.id/)

## view Website

### Landing Page
![plot](https://github.com/haidi20/website-dinas-pariwisata/blob/master/public/images/par%20-%20landing%20page.png)

### Images
![plot](https://github.com/haidi20/website-dinas-pariwisata/blob/master/public/images/par%20-%20images.png)

## How to Install on Local Environment
You can follow the following step to configure this project
- Clone the repository using the command "git clone https://github.com/haidi20/website-dinas-pariwisata.git"
### Running API
- First create database in mysql (whatever you want name datatabase)
- copy file .env.example and rename file to .env and configure for the database
- in file .env setting database by database previous you create
- Now go up to project and run the following commands <br>
  ```$ composer install``` <br>
  ```$ php artisan migrate``` <br>
  ```$ php artisan db:seed``` <br>
- And run command ```$ php artisan serve``` in your command line (make sure path command line in directory API) and <br> take a look at "localhost:8000" in browser
