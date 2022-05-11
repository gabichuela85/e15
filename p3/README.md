*Any instructions/notes in italics should be removed from the template before submitting*

# Project 3
+ By: *Gaby Leon-Guerrero*
+ Production URL: <http://e15p3.gabybrown.me>

## Feature summary


+ Visitors can register/log in
+ Users can add entries their bullet 
+ There's a file uploader that's used to upload poster images for each movie
+ User's can toggle whether movies in their collection are public or private
+ Each user has a public profile page which presents a short bio about their movie tastes, as well as a list of public movies in their collection
+ Each user has their own account page where they can edit their bio, email, password
+ Users can clone movies from another user's public collection into their collection
+ The home page features
  + a stream of recently added public movies
  + a list of categories, with a link to each category that shows a page of movies (with links) within that category

  
## Database summary
*Describe the tables and relationships used in your database. Delete the examples below and replace with your own info.*

+ My application has 3 tables in total (`users`, `movies`, `categories`)
+ There's a many-to-many relationship between `movies` and `categories`
+ There's a one-to-many relationship between `movies` and `users`

## Outside resources
*Your list of outside resources go here*

## Notes for instructor
*Any notes for me to refer to while grading; if none, omit this section*

## Tests
*Include the full output of running `codecept run acceptance --steps`. If you’re taking this course for undergraduate credit and are opting out from testing, simply put "undergraduate - opting out" in this section*