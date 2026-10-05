<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

namespace local_mdl_89701_test;

use core_course\hook\after_course_created;
use core_course\hook\after_course_updated;
use core_course\hook\after_form_saved;
use core_course\hook\after_form_submission;
use core_course\hook\before_course_created;
use core_course\hook\before_course_updated;
use core_course\hook\before_form_saved;

/**
 * Hook callbacks for local_mdl_89701_test.
 *
 * @package     local_mdl_89701_test
 * @copyright   2026
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**
     * Generic callback for any hook to output hook name and arguments for debugging.
     *
     * @param object $hook The hook instance.
     */
    public static function callback(object $hook): void {
        $hookname = get_class($hook);
        $arguments = print_r($hook, true);
        debugging("Hook: {$hookname}, Arguments: {$arguments}", DEBUG_DEVELOPER);
    }

    /**
     * Callback for after_course_created hook.
     *
     * @param after_course_created $hook
     */
    public static function after_course_created(after_course_created $hook): void {
        self::callback($hook);
    }

    /**
     * Callback for after_course_updated hook.
     *
     * @param after_course_updated $hook
     */
    public static function after_course_updated(after_course_updated $hook): void {
        self::callback($hook);
    }

    /**
     * Callback for after_form_saved hook.
     *
     * @param after_form_saved $hook
     */
    public static function after_form_saved(after_form_saved $hook): void {
        self::callback($hook);
    }

    /**
     * Callback for after_form_submission hook.
     *
     * @param after_form_submission $hook
     */
    public static function after_form_submission(after_form_submission $hook): void {
        self::callback($hook);
    }

    /**
     * Callback for before_course_created hook.
     *
     * @param before_course_created $hook
     */
    public static function before_course_created(before_course_created $hook): void {
        $hook->course->fullname = str_replace('before_course_created', 'before_course_created called', $hook->course->fullname);
        self::callback($hook);
    }

    /**
     * Callback for before_course_updated hook.
     *
     * @param before_course_updated $hook
     */
    public static function before_course_updated(before_course_updated $hook): void {
        $hook->course->fullname = str_replace('before_course_updated', 'before_course_updated called', $hook->course->fullname);
        self::callback($hook);
    }

    /**
     * Callback for before_form_saved hook.
     *
     * @param before_form_saved $hook
     */
    public static function before_form_saved(before_form_saved $hook): void {
        $hook->data->fullname = str_replace('before_form_saved', 'before_form_saved called', $hook->data->fullname);
        self::callback($hook);
    }
}
