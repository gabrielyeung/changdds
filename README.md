
## install steps
- https://jekyllrb.com/docs/installation/macos/


## app start up, for local dev
- refer to notes in `_config.yml`
  - `jekyll serve --baseurl ''` --> to emulate prod, when you want the root path as "/"
  - `jekyll serve` --> daily dev use


## for prod upload
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
