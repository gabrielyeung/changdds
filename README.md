
## Install steps
- https://jekyllrb.com/docs/installation/macos/

### Install notes ** current as of S 6/19/2022
- use ruby-2.7.6 instead
- gems issue w/ ruby-3.0.0+, see https://jekyllrb.com/docs/
  - https://gist.github.com/MelissaKaulfuss/a1bed20d8c8ad847e1e20e43615ddc9f
  - https://www.ruby-lang.org/en/downloads/releases/
  - https://github.com/jekyll/jekyll/issues/8523
  - https://github.com/github/pages-gem/issues/752

### SFTP setup
https://help.dreamhost.com/hc/en-us/articles/115001051531-FTP-security
https://help.dreamhost.com/hc/en-us/articles/115000675027-FTP-overview-and-credentials



## App start up, for local dev
- refer to notes in `_config.yml`
  - `jekyll serve --baseurl ''` --> to emulate prod, when you want the root path as "/"
  - `jekyll serve` --> daily dev use



## For prod upload
`jekyll build --config _config.yml,_config.prod.yml`
- https://stackoverflow.com/questions/41511696/jekyll-build-is-putting-localhost-links-in-site-production-files
  - issue with url being localhost
  - serve command is for localhost
  - build command preps for prod



## Captcha Notes
https://developers.google.com/recaptcha/docs/display#render_param
To test backend
- setup Postman
  POST: https://quyenchangdds.com/contact-form-handler.php
  click body tab, add the following keys
  - name
  - number
  - email
  - g-recaptcha-response or token


## For updating Alert messaging
- refer to https://github.com/gabrielyeung/changdds/pull/84/files
  - go to > _includes/header.html


