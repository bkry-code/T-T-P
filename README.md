# T\T\P

The aim of the *T\T\P* theme for the [Kirby CMS](https://getkirby.com) is to provide an easy to maintain publishing platform with direct search and filtering functionalities. *T\T\P* uses: Topics, Titles, Time, Abstracts and Authors to determine what Publications are shown based on the visitors' inputted queries, and, on top of that, allows these to be filtered by their Types.

## Installation
Replace the corresponding files and folders in a Kirby Installation with the files and folders from this repository.

## Configuration
### Accessing the panel
To access the administration area of the *Kirby CMS*, called the panel, go to *websitename.com/panel*. An account with the username *Admin* and the password *password* has already been created. Obviously both the username and password of the account should be changed, for safety purposes.

### Site options
Once logged in you will arrive at the dashboard. There is a menu button in the top-left corner - from here you can navigate to *Site Options* (and *Users* and *Log Out*). In the *Site Options* you can change or control the website's:

- Title;
- Subtitle;
- Description;
- Keywords;
- Location;
- Copyright statement;
- Logo's and favicons;
- Error messages.

### Users
On the users page, reached through the same menu in the top-left corner, you can edit and add users. Currently the *T\T\P* theme does not distinct between "roles". So all created users will have the same rights.

## Creating Types
Types can be seen as a combination of folders and categories. When creating a publication, this is always done as part of a Type. Some examples of Types are: Projects, Blogposts, Tutorials, Videos, Podcasts etc. One very important thing to note about Types is that they **always** have to consist of **one** word (no exceptions).

Types can be added from the Dashboard by adding a page - the Type template will automatically be selected. There is one Type that is a bit more special than the other Types: Pages.  Publications that belong to the Pages Type will also be added to the footer of the website. It is possible to delete the Pages Type just like any other Type. In order to delete a Type, all their publications must first be removed. The name of a Type can be changed at all times.

### Settings
T\T\P uses the [Font Awesome Icons](http://fontawesome.io/). You can change the icon of a Type by entering the name of the icon as shown on this webpage: [fontawesome.io/icons](http://fontawesome.io/icons).

Each Type also has several display settings that can be altered for the Publications that are contained within. These are:

- Displaying the author;
- Displaying the publication date;
- Displaying the topics;
- Displaying sharing buttons;
- Displaying the last revision date.

## Creating Publications
Publications are sub-pages of Types and are, therefore, created inside of a Type. In the left sidebar of a Type, when opened from the Dashboard, there is a Pages list. Add a new page to create a Publication. Each Publication has fields and options for:

- Title;
- Subtitle;
- Date;
- Author;
- Topics;
- Abstract;
- Text;
- Related content.

Publications are written in *Kirby CMS* flavoured Markdown - of which documentation can be found [here](https://getkirby.com/docs/content/text).

## Updates
The *T\T\P* theme was build for [my own website](https://dylandegeling.nl), thus it is possible that there will be updates somewhere in the future (no promises).