
# Chess.gq

This repository contains the source code for the chess.gq website. Chess.gq is a small site where you can play chess with a friend. Since the main site is hosted on Infinity Free, a static hosting provider that does not support Node.JS, the part of the website where you play the chess game is hosted externally on serveralive.herokuapp.com. The code used on the heroku site can be found under the "HEROKU" folder in this repository.
###
Play match: [https://chess.gq/play/friend/](https://chess.gq/play/friend/)
###
--
###

**Client:** HTML, CSS, JS, PHP

**Server:** NODE.JS

⠀

## Features

- Accounts where you can set custom profile pictures and descriptions.

- Leaderboard of the top 3 players who have the most amount of wins.

- Player vs. Player (across devices). Chess games include support for promotions, castling, en passant, threefold repetition, and insufficient material.

- Game analysis for logged-in users.


⠀

###
## Screenshots

![home](https://user-images.githubusercontent.com/83658956/151048276-0a23a59c-2b8c-4f01-a8a5-2bbb8b9bb96d.png)

![signup](https://user-images.githubusercontent.com/83658956/151048525-7806ba14-ed05-4246-936a-2fa5335701da.png)

![profile](https://user-images.githubusercontent.com/83658956/151048696-1426aaf1-21f2-4bcf-9215-9e8df04a0071.png)

![leaderboard](https://user-images.githubusercontent.com/83658956/151048845-f3bbde02-81ca-44d1-9ee6-6792c8e42aa9.png)

![choose](https://user-images.githubusercontent.com/83658956/151049058-4130aa32-1ab2-42a0-8471-ca8cdb60a5e8.png)

![play](https://user-images.githubusercontent.com/83658956/151049297-09f71251-db69-496c-9321-6966dbafd51f.png)


###
⠀

## Heroku

The contents of the "HEROKU" folder are hosted on serveralive.herokuapp.com. To test them locally (on your localhost), clone the folder and type the following in your terminal. NPM and Node.js extentions need to be installed for this to work.

```
npm install
node index.js
```
After doing this, you may host a game on your localhost by going to localhost:8083/?t=5#3, with 5 being the number of minutes and 3 being the room id (0 - 999999). The person who is not hosting only has to go to localhost:8083/#3, with 3 being the room id.

###

⠀
## Sources

 - [https://chess.gq/sources/](https://chess.gq/sources/)

###

⠀
## Author

- [@das150](https://github.com/das150)

##
[![MIT License](https://img.shields.io/apm/l/atomic-design-ui.svg?)](https://github.com/das150/chess.gq/blob/main/LICENSE)
