# infs3208
codebase from infs3202 assignment to containerise for infs3208

Setup

git clone https://github.com/Airo1011/infs3208.git
vim ./infs3208/example/my-project/myapp/application/config/config.php
//Update the $config['base_url'] = '[ExternalURL]:8000' to External URL
cd ./infs3208/example/
docker-compose up
(Loading is complete when Maria db shows as last with the ports and all)

usage
(User is the major issue when containerised, works fine locally, file_model works perfectly)
http://[ExternalURL]:8000/login -> Login Doesn't work
http://[ExternalURL]:8000/home -> Example of DB interacting with video
(Click on a Video and you can also comment anonymously)
http://[ExternalURL]:8000/video/search/20

End
Control+C to close docker
