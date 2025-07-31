<?php
/**
 * Plugin Name: PatternPack
 * Description: Registers custom block patterns from JSON files.
 * Version: 1.3
 * Author: Syncoria Studios
 */

function register_patterns_from_folder() {
    $theme_dir = get_stylesheet_directory(); // Barntemats sökväg

    // Lista över mappar med mönster
    $pattern_folders = [
        'syncoria-patterns' => 'Syncoria Patterns',
        'syncoria-full-page-patterns' => 'Syncoria Full Page Patterns',
        'syncoria-full-page-patterns-landing-pages' => 'Syncoria Full Page Patterns Landing Pages',
    ];

    foreach ($pattern_folders as $folder => $category_label) {
        $patterns_dir = $theme_dir . '/' . $folder;

        if (!is_dir($patterns_dir)) {
            continue;
        }

        // Registrera kategori (om den inte redan finns)
        register_block_pattern_category(
            sanitize_title($folder),
            ['label' => $category_label]
        );

        foreach (glob($patterns_dir . '/*.json') as $file) {
            $pattern_data = json_decode(file_get_contents($file), true);

            if (!isset($pattern_data['title']) || !isset($pattern_data['content'])) {
                continue;
            }

            register_block_pattern(
                sanitize_title($pattern_data['title']),
                [
                    'title'       => $pattern_data['title'],
                    'description' => isset($pattern_data['description']) ? $pattern_data['description'] : '',
                    'categories'  => isset($pattern_data['categories']) && !empty($pattern_data['categories']) 
                                    ? $pattern_data['categories'] 
                                    : [sanitize_title($folder)],
                    'content'     => $pattern_data['content'],
                ]
            );
        }
    }
}

add_action('init', 'register_patterns_from_folder');
