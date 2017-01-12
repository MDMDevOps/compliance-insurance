# Project Repo for Compliance Insurance

Project repository for syncing local, and staging work for Compliance Insurance

## Usefule Links
- **Staging:** [http://mdmserver.us/complianceinsurance](http://mdmserver.us/complianceinsurance)

## Contacts
[mailto:bob.moore@midwestdigitalmarketing.com](bob.moore@midwestdigitalmarketing.com)

### Important Notes:
1. Never PUSH without first PULLING
2. *Never PUSH without first PULLING*
3. **Never PUSH without first PULLING**

...in other words

#### Always PULL before you PUSH

<hr>

## Instruction

1. Install WordPress locally using the latest version
2. Clone and configure repository
3. Configure DB Sync
4. Pull Content => Push Code

### 1. Install Wordpress

For specific installation instructions on this step, google it...or whatever.

### 2. Clone and configure repository as the wp-content directory

```bash
git clone git@github.com:MDMDevOps/compliance-insurance.git wp-content
```

Open up **.git/config** and add the block:

```bash
	[merge "theirs"]
	    name = "Keep theirs merge"
	    driver = false
```

This means we keep the repo version of compiled files, and recompile manually prior to pushing


### 3. Configure DB Sync

- Activate the migrate DB plugin, and migrate media plugin
- Go to staging server and grab API key from migrate DB settings
- Paste settings into local plugin, and pull content from staging. Make sure to include media files.

Note: Media files (the upload directory) are kept out of the repo so non-development users can upload media, and we can sync using this method

### 4. Do work. Push CODE to staging, and Pull CONTENT from staging

Note: It *may* be safe at any given time to also push content to staging if you are confident nobody else has been on the staging server making content edits. Most of the time this is ok...but it comes with no guarantees.
