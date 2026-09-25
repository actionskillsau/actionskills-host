# ActionSkills Host

WordPress plugin that shows ActionSkills hosting information in a full-width tabbed panel at the top of the Dashboard, above the normal widgets.

- Replaces the old `rc_sweet_custom_dashboard` snippet and the dash.actionskills.au iframe. Remove the snippet before activating.
- Content lives in the plugin, so it is updated through plugin releases.

```
templates/panel.php   ← tab list and all panel content (edit this)
assets/admin.css      ← panel styles
assets/admin.js       ← accessible tabs (click, arrow keys, Home/End)
assets/actionskills.png
```

To add a tab, add an entry to `$tabs` in `templates/panel.php` and a matching `<div role="tabpanel" id="actionskills-tab-{id}" … hidden>` block.

## Updates via GitHub (free)

Uses [Plugin Update Checker](https://github.com/YahnisElsts/plugin-update-checker) v5.

**Setup (once)**
1. Create a public GitHub repo `actionskills-host`. The repo root is the plugin's contents.
2. Copy the PUC v5 release folder into `plugin-update-checker/`.
3. Replace `YOUR-USERNAME` in `actionskills-host.php`.
4. Commit and push to `main`, then install this version manually on each site (the last manual install).

**Each release**
1. Bump `Version:` in the plugin header.
2. Commit and push to `main`.
3. On GitHub, create a release with the tag `vX.Y.Z` matching the header.

Sites check about every 12 hours. You can also use "Check for updates" on the Plugins screen. You can turn on auto-updates per site.

**Notes**
- The tag and the header version must match.
- Unauthenticated limit is 60 req/hr per IP. If many sites share a server, add a read-only fine-grained token via `setAuthentication()`.
- Test on one site before publishing a release.
