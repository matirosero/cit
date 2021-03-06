# mro-cit-front-end-registration

This plugin handles front-end registration and editing for uses

## Functions

Description of the various functions by partial

### registration

Register new members. For admins or new (logged out) users.

#### mro_cit_register_link( $link )

Filter for 'register', changes registration URL.

#### mro_cit_registration_form()

Checks user can access registration form, prints form and/or any warnings/notices.

#### mro_cit_registration_form_fields()

The actual registration form.

### frontend-manage-members

For admins. Manage members from frontend.

#### cit_approve_member()

Activates when "Activate" is checked/unchecked. Toggles from pending to full member and subscribes/unsubscribes main email and additional contacts to Mailchimp.

#### cit_mc_delete_member()

Activates when "X" is clicked. Deletes user from wordpress and unsubscribes all emails from Mailchimp.


### registration

For logged out users. Creates and processes the form form that handles a a new registration.

Only subscribes personal accounts to MailChimp.

Does not include listing additional contacts for enterprise members.


### user-additional-contacts

For admins. Creates (via CMB2) and processes the form form that handles a user's additional contacts.

Only subscribes/unsubscribes from Mailchimp when member is not pending.
