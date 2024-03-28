# raw_twitter
A raw twitter for assignment 2

TODO:

- [ ] Check HTML correctness
- [ ] ADD a footer (not)
- [ ] One CSS or at least?
- [ ] Creates a responsive and user-friendly interface using HTML and CSS. Ensures a consistent and pleasant user experience across different devices
- [ ] unified header
- [ ] add comments like creator for each page



A breakdown of the tasks assigned to each team member.


Ham:

- [x] Filtering(Likes asd desc?,): Provides effective content filtering options. Allows users to filter content based on relevant criteria.
- [x] Logout
- [ ] DDL, DML
- [ ] Code reorginization 

Nolan:

- [ ] ppt
- [ ] All supporting documentation that contains at a minimum a web map, a wireframe , a functionality guide, a description of the database, and any special coding considerations.
- [ ] A breakdown of the tasks assigned to each team member.
- [ ] Ensures a consistent and pleasant user experience across different devices.

Azi:

- [ ] Implements proper error handling for database operations. Provides clear error (Sign up error with duplicate email)
- [ ] messages to users (When creating user, check email status)
- [ ] slides


## Basic Git

// . means add all files at current and sub dirs
git add pages/index.html. 

// commit
git commit -m "Your modification descriptions"

// push to the center repo project
git push -u origin main

// Update local project from the center repo project
git pull


## DEMO

0. run ddl, dml in phpadmin
1. random user login -> Invalid email or password or you don't have an account. Please try again.
2. user sign up, wrong email format, exist email, sign up successful -> main page
3. logout, not able to see profile or main page when logout 
4. new user sign in 
5. main page demo, filter, search, post
6. profile demo, edit, delete