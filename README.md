🚀 Tekkura Web Panel - HestiaCP Branding Package

This repository contains all the customized files (CSS, PHP templates, logos, and favicons) required to rebrand a standard Hestia Control Panel installation into the Tekkura Web Panel.

This ensures consistent branding across all your VPS deployments, including the main dashboard, login pages, 2FA prompt, and File Manager.

📋 Prerequisites

Before starting the deployment on your new VPS, ensure you have the following:

HestiaCP: Must be installed and running.

Git: Installed on the new VPS (sudo apt install git -y).

Personal Access Token (PAT): You must use a Personal Access Token (PAT) from your GitHub account (for qwerc999) as the password when cloning the repository over HTTPS.

⚙️ Deployment Instructions (New VPS)

Follow these steps to deploy your custom branding package. This process will overwrite the default HestiaCP files with your branded versions.

Step 1: Clone the Repository to a Temporary Location

Start by installing Git and changing to the temporary directory, then clone the repository using the HTTPS URL.

# 1. Update and install Git (if needed)
sudo apt update && sudo apt install git -y

# 2. Change to the temporary directory
cd /tmp

# 3. Clone the repository (You will be prompted for your GitHub username and PAT)
sudo git clone [https://github.com/qwerc999/Hestiacp-custom-web.git](https://github.com/qwerc999/Hestiacp-custom-web.git)


🔑 Authentication Note: When prompted for credentials, enter your GitHub username (qwerc999) and your Personal Access Token (PAT) as the password.

Step 2: Copy Files to Hestia Root

The repository contains a web/ folder structure mirroring HestiaCP's installation path (/usr/local/hestia/web/). We copy the contents recursively to apply the changes.

# Change directory into the cloned repository's web folder
cd Hestiacp-custom-web/

# Copy all files and folders recursively to the Hestia web root.
# This overwrites the default Hestia files with your branded versions.
sudo cp -r web/* /usr/local/hestia/web/


Step 3: Clean Up and Restart Services

Clean up the temporary folder:

cd /tmp
sudo rm -rf Hestiacp-custom-web


Restart the Hestia service:
This step is mandatory to clear the Hestia web cache and load the new PHP templates, CSS files, and logo paths.

sudo systemctl restart hestia


✅ Verification

After restarting the service, open your browser and navigate to your HestiaCP URL. You should immediately see the Tekkura Web Panel login page, followed by the dashboard featuring your custom theme, logos, and branded text.
