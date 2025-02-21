# *** Application Briefing ***

Application Briefing

A client needs an API where he can aggregate his website statistics. This API needs to be as lightweight and flexible as possible. We'd like you to put this together from scratch, so no frameworks please! Also, composer packages for ROUTER are forbidden! Using composer for other sorts of packages is allowed, but not required.

Example: Client makes a request to fetch data for visits to his website for the current month.
This data is then pulled from various databases/external services, and aggregated.
The result is then returned to the client.

Response example:
{"error": false, "message": "", data: ["Google Analytics" : 150, "Positive Guys": 5000, etc...]}

Development Requirements:
At the beginning, open Git repository that only contains index.php.
First commit should be committed within the hour after you receive the test from our HR.
After that, commit as much as you can so we can see how you think in process of development.
In the end, send us a link to the repository.
(After 48h you can commit any improvement on some other branch so we can see it, but we will be focused on commits within 48h on the master branch.)
You must use PHP8 with all its features that you can implement.

App must be able to support multiple sources at once.
It needs to be as simple as possible to install a new source.
You must have at least 3 different source types with some pseudo logic to get data.
Latest method where you would take data from the source you can return some hardcoded value.
App must be able to handle a wide variety of different “external” APIs.
App must gracefully handle errors.
This project is designed as infrastructure rather than a fully fleshed application.
Your implementation should just show the process you would follow and the architecture you would implement.
You are welcome to create skeleton methods/classes, then document the process that would happen in said method and return a static value (or call next method, whatever).
App must work with JSON. We really hate XML :-D, but there should be logic that supports multiple data formats and it should be easy to pick some of them.
Adding support for Docker or another form of “infrastructure as code” tools is optional.
It’s ok to instead specify requirements in a README file to get your project to start up.
