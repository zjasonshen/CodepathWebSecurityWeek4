# Project 4 - Forgery, Theft, and Hijacking Prevention

Time spent: **7** hours spent in total

## User Stories

The following **required** functionality is completed:

1\. [X]  Required: Test for initial vulnerabilities

2\. [X]  Required: Configure sessions
  * [X]  Required: Only allow session IDs to come from cookies
  * [X]  Required: Expire after one day
  * [X]  Required: Use cookies which are marked as HttpOnly

3\. [X]  Required: Complete Login page.
  * [X]  Required: Show an error message when username is not found.
  * [X]  Required: Show an error message when username is found but password does not match.
  * [X]  Required: After login, store user ID in session data.
  * [X]  Required: After login, store user last login time in session data.
  * [X]  Required: Regenerate the session ID at the appropriate point.

4\. [X]  Required: Require login to access staff area pages.
  * [X]  Required: Add a login requirement to *almost all* staff area pages.
  * [X]  Required: Write code for `last_login_is_recent()`.

5\. [X]  Required: Complete Logout page.
  * [X]  Required: Add code to destroy the user's session file after logging out.

6\. [X]  Required: Add CSRF protections to the state forms.
  * [X]  Required: Create a CSRF token.
  * [X]  Required: Add CSRF tokens to forms.
  * [X]  Required: Compare tokens against the stored version of the token.
  * [X]  Required: Only process forms data sent by POST requests.
  * [X]  Required: Confirm request referer is from the same domain as the host.
  * [X]  Required: Store the CSRF token in the user's session.
  * [X]  Required: Add the same CSRF token to the login form as a hidden input.
  * [X]  Required: When submitted, confirm that session and form tokens match.
  * [X]  Required: If tokens do not match, show an error message.
  * [X]  Required: Make sure that a logged-in user can use pages as expected.

7\. [X]  Required: Ensure the application is not vulnerable to XSS attacks.

8\. [X]  Required: Ensure the application is not vulnerable to SQL Injection attacks.

9\. [X]  Required: Run all tests from Objective 1 again and confirm that your application is no longer vulnerable to any test.


The following advanced user stories are optional:

* [X]  Bonus Objective 1: Identify security flaw in Objective #4 (requiring login on staff pages)
  * [X]  Identify the security principal not being followed.
  * [X]  Write a short description of how the code could be modified to be more secure.

* [X] Bonus Objective 2: Add CSRF protections to all forms in the staff directory

* [X]  Bonus Objective 3: CSRF tokens only valid for 10 minutes.

* [X]  Bonus Objective 4: Sessions are valid only if user-agent string matches previous value.

* [ ]  Advanced Objective: Set/Get Signed-Encrypted Cookie
  * [ ]  Create "public/set\_secret\_cookie.php".
  * [ ]  Create "public/get\_secret\_cookie.php".
  * [ ]  Encrypt and sign cookie before storing.
  * [ ]  Verify cookie is signed correctly or show error message.
  * [ ]  Decrypt cookie.

## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://i.imgur.com/link/to/your/gif/file.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

The security prinicipal that the login of the staff pages doesn't follow is to never trust users.
The reason that is a major security flaw is that any user has the ability to modify/delete any entry in the database. 
In order for the system to be more secure users should have limited write/modify access but still maintain full read access.
Restrict the users to only be able to modify/delete the entries they created. Have a root account that has access to modify
user accounts. Users shouldn't be able to modify other users.

## License

    Copyright [2017] [Jason Shen]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
