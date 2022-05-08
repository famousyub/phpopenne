<?php 
/*
 * 
 * 
 * RewriteEngine On
RewriteRule ^view$  /Ads.php [L,NC,QSA]
RewriteRule ^home$  /home1.hack [L,NC,QSA]
RewriteRule ^([a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12})$ /index.php?id=$1 [L,NC,QSA]

<IfModule mod_fastcgi.c>
<FilesMatch \.php$>
    SetHandler hhvm-php-extension
</FilesMatch>

<FilesMatch \.hh$>
    SetHandler hhvm-hack-extension
</FilesMatch>

<FilesMatch \.hack$>
    SetHandler hhvm-hack-extension
</FilesMatch>

Alias /ec /ec
Action hhvm-php-extension /ec virtual
Action hhvm-hack-extension /ec virtual

FastCgiExternalServer /ec -host 127.0.0.1:8022 -pass-header Authorization -idle-timeout 300

</IfModule>

 */
echo "404 not found";



?>

 <div class="field">
            <label class="label">Message</label>
            <div class="control">
              <textarea name="message" class="textarea" v-validate="'required|polite'" placeholder="Message" v-bind:class="{'is-danger': errors.has('message')}" v-model="form.message"></textarea>
            </div>
            <p class="help is-danger" v-show="errors.has('message')">
              {{ errors.first('message') }}
            </p>
          </div>

          <div class="field">
            <label class="label">Inquiry Type</label>
            <div class="control">
              <div class="select">
                <select v-model="form.inquiry_type">
										<option disabled value="">Nothing selected</option>
										<option v-for="option in options.inquiry" v-bind:value="option.value">
											{{ option.text }}
										</option>
									</select>
              </div>
            </div>
          </div>

          <div class="field">
            <label class="label">LogRocket Usecases</label>
            <div class="control">
              <div class="select is-multiple">
                <select multiple v-model="form.logrocket_usecases">
										<option>Debugging</option>
										<option>Fixing Errors</option>
										<option>User support</option>
									</select>
              </div>
            </div>
          </div>

          <div class="field">
            <div class="control">
              <label class="checkbox">
									<input type="checkbox" v-model="form.terms">
									I agree to the <a href="#">terms and conditions</a>
								</label>
            </div>
          </div>

          <div class="field">
            <label>
								<strong>What dev concepts are you interested in?</strong>
							</label>
            <div class="control">
              <label class="checkbox">
									<input type="checkbox" v-model="form.concepts"
									value="promises">
									Promises
								</label>
              <label class="checkbox">
									<input type="checkbox" v-model="form.concepts" 
									value="testing">
									Testing
								</label>
            </div>
          </div>

          <div class="field">
            <label><strong>Is JavaScript awesome?</strong></label>
            <div class="control">
              <label class="radio">
									<input v-model="form.js_awesome" type="radio" value="Yes">
									Yes
								</label>
              <label class="radio">
									<input v-model="form.js_awesome" type="radio" value="Yeap!">
									Yeap!
								</label>
            </div>
          </div>