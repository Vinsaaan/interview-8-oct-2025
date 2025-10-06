Option A: WordPress Case Studies Plugin (Section 4A)

A lightweight custom WordPress plugin built without plugin builders for the pre-interview test.

==================================
Features
==================================
-Registers a Custom Post Type named Case Studies (case_study)
-Adds a Shortcode [featured_case_studies] to display the 3 latest published Case Studies
-Applies a Filter Hook that prefixes titles with “Case Study:” only on the archive page (/case-studies/)
-Uses core WordPress APIs (register_post_type, add_shortcode, add_filter)
-Self-contained plugin — no external dependencies

==================================
Usage
==================================
-Copy case-studies-interview.php into:
wp-content/plugins/case-studies-interview/

-In the WP Admin → Plugins, activate “Case Studies (Interview)”
-Go to Settings → Permalinks → Save Changes (refresh rewrite rules)
-A new Case Studies menu will appear in the sidebar
-Add several Case Studies (Title, Content, Excerpt, Image)

-To show the 3 latest Case Studies on any page:
1. Create a new Page
2. Add this shortcode in the content box:
[featured_case_studies]
3. Publish and view the page — only 3 recent Case Studies will appear
-Visit /case-studies/ to see the archive listing with the “Case Study:” title prefix

==================================
File Structure
==================================
section4-wordpress/
│
└── wp-content/
  └── plugins/
    └── case-studies-interview/
      └── case-studies-interview.php ← Main plugin file (CPT + shortcode + filter)

==================================
Explanation / Answers for #4
==================================
To override a plugin layout using the theme/template hierarchy, create template files inside the active theme such as:

archive-case_study.php
single-case_study.php

WordPress will automatically use these theme files before the plugin’s templates, letting you customize the layout safely without editing the plugin directly.

==================================
Notes
==================================
-Data is stored using WordPress’s native post system (no custom tables).
-Shortcode output updates automatically when new Case Studies are published.

-The title filter only changes display output — the original post titles remain unchanged.
e.g: 
| Page                    | URL Example                                     | What You See                                   |
| ----------------------- | ----------------------------------------------- | ---------------------------------------------- |
| **Single Case Study**   | `/case-studies/ai-powered-logistics-dashboard/` | **AI-Powered Logistics Dashboard**             |
| **Archive Page (list)** | `/case-studies/`                                | **Case Study: AI-Powered Logistics Dashboard** |

Because the plugin adds this filter:
add_filter('the_title', function ($title, $post_id = 0) {
    if (is_post_type_archive('case_study') && get_post_type($post_id) === 'case_study') {
        return 'Case Study: ' . $title;
    }
    return $title;
}, 10, 2);
