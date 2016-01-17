## tcd-WT-trello-clone


This project is an assignment for TCD web technologies project.

I created a small MVP for an application which is largely inspired by trello the famous project management tool.

The application allows to create Boards which represents projects. In each boards the user can create lists (To do/ In progress/ Need a review/ Merge pending/ Done...) and add cards which represents tasks to do.

The web application doesn't allow yet to switch a card from a list to another one and neither does it allow user collaboration on boards. The database on the other hand already allows those features.

I implemented a simple router (router.php) and the project is built upon a basic MVC structure made from scratch.


## Install

Clone the repository in your apache server folder :

```shell
$ git clone https://github.com/Skaelv/tcd-WT-trello-clone.git
```

... or download and export the zip file.

Import trello-clone.sql file in your phpmyadmin interface.

Change the mysql settings ($user and $pass var) to fit with your local mysql settings in 'DB.php' file.  

Open 'http://localhost/tcd-WT-trello-clone/' in your browser. 

Login using 'antoinek@tcd.ie' or create a new account.

## Entity Diagram Relationship

![](https://github.com/Skaelv/tcd-WT-trello-clone/raw/master/images/Entity_Diagram_Relationship.jpeg?raw=true)

## Relational Schema Mapping

![](https://github.com/Skaelv/tcd-WT-trello-clone/raw/master/images/Relational_Schema_Mapping.jpeg?raw=true)

## Dependencies

The project uses no dependencies. You simply need an apache server runing.
