Selenium server was started as standalone using the following commands:
    npm install selenium-standalone -g
    selenium-standalone install
    selenium-standalone start

User Credentials for Log In need to be added in 'tests\Support\Page\LoginPage.php'
Constants were used to make it easier for now, configuration files or environments variables would be
better to store sensitive data.

Profile Step object with only login methos is a bit unnecessary, but I wanted to try this feature

Editing profile name and lastname does not work as expected, text is added instead of clearing and filling
new value

It is only checked that 'change language' button is present, but it is not clicked and checked for its
fucntionality.

Besides that tests are passed(HTML report is available), though pages can be implemented better and xpath locators and 
assertions can also be improved at several places

Overall I liked the Codeception framework and tried to use as many of its features as possible

There are also comment menthods in codeception(e.g. amGoingTo, expect), but I decided to not focus on them
for now
