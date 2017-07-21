<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pwmap
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>


    
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700|Lato:400,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/lib/chosen.css">
    <link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/css/styles.css">
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'pwmap' ); ?></a>
	
   <header class="fixed-ns relative-m">
            <svg style="position: absolute; width: 0; height: 0;" width="0" height="0" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <defs>
                    <symbol id="icon--home" viewBox="0 0 25 25">
                        <path d="M12.62,2.5a.67.67,0,0,0-.37.13L.37,12a.65.65,0,0,0-.11.89.66.66,0,0,0,.89.1L12.64,3.93,24.12,13a.63.63,0,0,0,.78-1L13,2.63A.71.71,0,0,0,12.62,2.5ZM4.83,10.91l-1.25,1v10a.63.63,0,0,0,.63.63h5.94a.63.63,0,0,0,.63-.63V16.25h3.75v5.63a.63.63,0,0,0,.63.63h5.94a.63.63,0,0,0,.63-.63v-10l-1.25-1V21.25H15.76V15.63a.63.63,0,0,0-.63-.63h-5a.63.63,0,0,0-.63.63v5.63H4.83Z"/>
                    </symbol>
                    <symbol id="icon--stories" viewBox="0 0 25 25">
                        <path d="M12.82,20l-.48-.15a19.29,19.29,0,0,0-5.26-.69,19,19,0,0,0-5.17.7L1.45,20V4.73l.2-.1A12.3,12.3,0,0,1,7,3.54a15.67,15.67,0,0,1,5.62,1.07l.24.09V20ZM2.19,5.19V19.05a19.85,19.85,0,0,1,4.9-.6,20.87,20.87,0,0,1,5,.59V5.21A14.88,14.88,0,0,0,7,4.27,12.31,12.31,0,0,0,2.19,5.19Z"/><path d="M12.09,20V4.7l.24-.09a15.67,15.67,0,0,1,5.62-1.07,12.28,12.28,0,0,1,5.32,1.09l.2.1V20L23,19.89a19,19,0,0,0-5.17-.7,19.19,19.19,0,0,0-5.26.69Zm5.74-1.58a19.86,19.86,0,0,1,4.9.6V5.19a12.31,12.31,0,0,0-4.79-.91,14.87,14.87,0,0,0-5.12.93V19A20.87,20.87,0,0,1,17.83,18.46Z"/><polygon points="25 21.46 0 21.46 0 5.59 1.82 5.59 1.82 6.32 0.74 6.32 0.74 20.73 24.26 20.73 24.26 6.69 23.1 6.69 23.1 5.95 25 5.95 25 21.46"/><rect x="12.09" y="19.53" width="0.74" height="1.56"/>
                    </symbol>
                    <symbol id="icon--hazards" viewBox="0 0 25 25">
                        <path d="M19.08,19.53a.48.48,0,0,1,0-1,5,5,0,0,0,5-5,5.09,5.09,0,0,0-2.1-4.08.48.48,0,0,1-.19-.38v-.4A6.39,6.39,0,0,0,9,8.75a7.18,7.18,0,0,0,.27,1.88.48.48,0,0,1-.8.47,4.38,4.38,0,1,0-3.09,7.48.48.48,0,1,1,0,1,5.35,5.35,0,0,1,0-10.69,5.28,5.28,0,0,1,2.72.75,7.35,7.35,0,1,1,14.65-.84v.17A6,6,0,0,1,25,13.62,5.92,5.92,0,0,1,19.08,19.53Z"/><path d="M10.78,23.48a.48.48,0,0,1-.38-.78l2.16-2.78L11.32,20a.44.44,0,0,1-.45-.25.48.48,0,0,1,0-.51l1.83-2.58a.48.48,0,1,1,.78.56L12.26,19l1.3-.06a.44.44,0,0,1,.45.26.48.48,0,0,1,0,.52l-2.8,3.61A.48.48,0,0,1,10.78,23.48Z"/><path d="M16.28,19.59a.48.48,0,0,1-.43-.69l1-2a.48.48,0,0,1,.87.42l-1,2A.48.48,0,0,1,16.28,19.59Z"/><path class="cls-1" d="M8.27,19.59a.48.48,0,0,1-.43-.69l1-2a.48.48,0,0,1,.87.42l-1,2A.48.48,0,0,1,8.27,19.59Z"/><path d="M14.56,23.6a.48.48,0,0,1-.43-.69l1-2a.48.48,0,1,1,.87.42l-1,2A.48.48,0,0,1,14.56,23.6Z"/><path d="M6.55,23.6a.48.48,0,0,1-.43-.69l1-2a.48.48,0,1,1,.87.42l-1,2A.48.48,0,0,1,6.55,23.6Z"/><path d="M2.06,11.41a5.86,5.86,0,0,1-2-3.49.48.48,0,0,1,.16-.45.48.48,0,0,1,.47-.09,3.13,3.13,0,0,0,.94.15A3.49,3.49,0,0,0,5.15,4a3.78,3.78,0,0,0-.51-1.83.48.48,0,0,1,.27-.69,2.32,2.32,0,0,1,.72-.08A5.63,5.63,0,0,1,10.7,4.53L9.84,5a4.61,4.61,0,0,0-4-2.59A4.41,4.41,0,0,1,6.11,4,4.44,4.44,0,0,1,1.63,8.49l-.43,0a4.79,4.79,0,0,0,1.48,2.21Z"/>
                    </symbol>
                    <symbol id="icon--climate" viewBox="0 0 25 25">
                        <path d="M23.5,20.3h-.23v.41h-4V20.3h-.23v.41h-4V20.3h-.23v.41h-4V20.3h-.24v.41h-4V20.3H6.49v.41H5.24a2.79,2.79,0,0,0-.55-3.39l3.73-2.14a.56.56,0,0,0,.66,0l3.9,2.2s0,0,0,0A.57.57,0,1,0,14,17l1.83-4.51a.57.57,0,0,0,.44-.26l1.76.47,1.17,2.52a.57.57,0,1,0,.81,0l.54-1.85,2,.53a.57.57,0,0,0,1.12-.13.56.56,0,0,0-.12-.35L25,10.91l-.13-.7-1.81,3.05h0a.57.57,0,0,0-.46.24L20.64,13l2.24-7.63-.32-.48-2.37,8-1.87-.5L15.93,7.19a.57.57,0,1,0-1-.3.56.56,0,0,0,.14.37l-2.58,5.43h0a.56.56,0,0,0-.25.06L9.28,10a.56.56,0,0,0,0-.18.57.57,0,1,0-1.13,0,.56.56,0,0,0,.07.27l-3.79,5V4.51a1.67,1.67,0,1,0-3.35,0V17.14A2.79,2.79,0,1,0,5,21H6.49v.34h.23V21h4v.34h.24V21h4v.34h.24V21h4v.34h.23V21h4v.34h.23V21H25v-.31H23.5Zm-3.45-7L19.55,15l-1-2.1ZM4.47,15.78l0,0,4.12-5.43h.12a.57.57,0,0,0,.21,0l2.9,2.75a.57.57,0,1,0,1-.2l2.59-5.45h.09l2.2,4.74-1.44-.39a.57.57,0,1,0-.94.57l-1.83,4.49a.56.56,0,0,0-.32.12L9.31,14.78a.44.44,0,0,0,0,0,.57.57,0,1,0-1.13,0s0,0,0,.05L4.47,16.92ZM2.79,21.42a2,2,0,0,1-.93-3.87v-13a.93.93,0,1,1,1.86,0v13a2,2,0,0,1-.93,3.87Z"/><path d="M4.32,19.4A1.53,1.53,0,1,1,2.26,18V10.32H3.32V18A1.52,1.52,0,0,1,4.32,19.4Z"/>
                    </symbol>
                    <symbol id="icon--about" viewBox="0 0 25 25">
                        <path d="M20.19,12.07A3.09,3.09,0,1,0,17.1,9,3.09,3.09,0,0,0,20.19,12.07Zm0-5.36A2.27,2.27,0,1,1,17.93,9,2.27,2.27,0,0,1,20.19,6.72Z"/><path d="M4.81,12.07A3.09,3.09,0,1,0,1.72,9,3.09,3.09,0,0,0,4.81,12.07Zm0-5.36A2.27,2.27,0,1,1,2.54,9,2.27,2.27,0,0,1,4.81,6.72Z"/><path d="M25,15.09a2.06,2.06,0,0,0-1.51-2,15.39,15.39,0,0,0-3.64-.35v.82h.35a14.5,14.5,0,0,1,3.11.33A1.24,1.24,0,0,1,24.17,15q-.1,1.4-.21,2.87a2.31,2.31,0,0,1-1.69,2,14.51,14.51,0,0,1-4.16,0,1.52,1.52,0,0,1-.38-.12A3.91,3.91,0,0,0,18.38,18c.08-1.08.15-2.14.23-3.19l0-.56a2.56,2.56,0,0,0-1.87-2.51,20.08,20.08,0,0,0-8.56,0A2.42,2.42,0,0,0,7,12.52a2.46,2.46,0,0,0-.61,1.71l0,.55c.08,1,.15,2.11.23,3.19a3.9,3.9,0,0,0,.64,1.83,1.53,1.53,0,0,1-.37.12,14.51,14.51,0,0,1-4.16,0,2.31,2.31,0,0,1-1.7-2C1,16.93.89,16,.83,15a1.24,1.24,0,0,1,.86-1.17,14.57,14.57,0,0,1,3.12-.34h.34v-.82a15.44,15.44,0,0,0-3.65.35,2.06,2.06,0,0,0-1.5,2Q.11,16.5.21,18A3.11,3.11,0,0,0,2.6,20.72a15.36,15.36,0,0,0,4.41,0H7a2.43,2.43,0,0,0,.77-.28,3.45,3.45,0,0,0,1.85,1,19.85,19.85,0,0,0,2.86.21,19.94,19.94,0,0,0,2.86-.21h0a3.43,3.43,0,0,0,1.84-1,2.46,2.46,0,0,0,.78.28,15.36,15.36,0,0,0,4.41,0h0A3.11,3.11,0,0,0,24.79,18Q24.89,16.5,25,15.09Zm-9.76,5.55a19.1,19.1,0,0,1-5.47,0A3.11,3.11,0,0,1,7.45,17.9c-.09-1.27-.18-2.52-.27-3.74A1.74,1.74,0,0,1,8.4,12.51a19.24,19.24,0,0,1,8.19,0,1.74,1.74,0,0,1,1.24,1.65q-.14,1.83-.27,3.74A3.11,3.11,0,0,1,15.24,20.65Z"/><path d="M12.5,10.66A3.67,3.67,0,1,0,8.83,7,3.67,3.67,0,0,0,12.5,10.66Zm0-6.51A2.84,2.84,0,1,1,9.66,7,2.84,2.84,0,0,1,12.5,4.16Z"/>
                    </symbol>
                    <symbol id="icon--involved" viewBox="0 0 25 25">
                        <path d="M0,11.34V23a.91.91,0,0,0,.87.87H24.13A.91.91,0,0,0,25,23V11.34a.91.91,0,0,0-.87-.87H20.07a.87.87,0,1,0,0,1.74h3.19v9.88H1.74V12.21H4.93a.87.87,0,1,0,0-1.74H.87A.92.92,0,0,0,0,11.34Z"/><path d="M12.5,1.16a1,1,0,0,0-.6.24L7,6.05a1,1,0,0,0-.07,1.27.91.91,0,0,0,1.27,0L11.63,4V18.9a.87.87,0,0,0,1.74,0V4l3.47,3.27a1,1,0,0,0,1.27,0A1,1,0,0,0,18,6.05L13.1,1.4a.84.84,0,0,0-.6-.24Z"/>
                    </symbol>
                    <symbol  id="icon--iowa" viewBox="0 0 25 25">
                        <path d="M19.33,22l-1-1.14-.15-.06L18,20.51h-.8l-14.19.12L3.15,20l-.09,0-.21-.49,0-.35.15-.8,0-.26L2.82,18l0-.4v-.18l0-.27,0,0-.13-.18-.06-.39,0-.16-.18-.12.07-.58,0,0-.12-.33L2,15,2,13.94l.1-.47-.18-.29-.12-.34,0-.22-.09-.06-.26-.42,0-.31-.07-.05L1,11.11l0-.31,0,0L1,10.57l-.15-.21,0-.4L.57,9.9V9.33l0,0V9.2l-.15-.1,0-.3L.09,8.38,0,8.05l.24-.8.14-.32V6.75l.07-.11v0l0-.09,0-.44L.58,6H.52L.23,5.4l0-.15L.18,5.1l.17-.51L.2,4.25.18,4h0v-.2l.06-.64.64-.06H21L21,3.82l.1.22.17.08.32.46,0,.56-.3.62.32,1.87,1,.31.35.49L23.2,9V9.3l0,.05.57.52.16.37.05.29.81.63,0,.46h0L25,12l-.38,1.74-.34.25-.11.71-.54.6-.46.22-.15,0-.24.26-.49.16-.72.07-.06.27.26.27.18.35.11.65-.05.49-.17.4-.34.45,0,.38-.31.71-.64.39v.17l0,.18,0,.44-.25.41-.49.21Zm-.19-2.46,0,0,0-.07.86-.49.1-.58.12-.23.33-.45V17.6l-.08-.25-.29-.17-.18-.64v-.2l.1-.64.29-.69.43-.33,1.07-.1.14-.2.4-.17.23,0,.07-.07.4-1,.24-.3.09-.62-.08-.25-.24-.17L23,11.62l-.11-.2-.21-.14-.12-.67-.65-.55-.25-.44.07-.39-.08-.12-1-.36-.31-.39-.19-.58-.32-2.13L20,5.1l0,0-.28-.4,0-.22H1.8V4.9l.14.17L2,5.39,2.08,6l-.19.78h0v.11L1.61,7.91,1.55,8l.27.32.1.53.25.2.19.65L2.3,10l.09.13,0,.13.11.58,0,.13.26.46.06.26.3.28.11.6,0,.12.2.25.11.4-.13.76.06.05v.08l.13.11.33.34-.06.14.21.19L4,15.51l.44.28-.28.57.54.53-.45.3,0,.13.08.16,0,.07,0,.09,0,.25V18l.06.42,0,.23,0,.1-.07.34.13.16,12.78-.11H19ZM1.19,6.62l.17.06h.12Z"/>
                    </symbol>
                </defs>
                
            </svg>
            

            <span id="logo" class="img-replace"><img src="<?php bloginfo( 'template_url' ); ?>/img/andreas_logo.png" alt="Iowa Map" /></span>
            <h1 id="logotype" class="f-tan-light normal f-base-s f3-m f3-l serif">Peoples' Weather Map</h1>
            <a class="hamburger" data-toggle=".show-menu" href="#"><span></span></a>
            <div class="show-menu show-menu-sm show-menu-md">
                <nav id="main-nav">
                    <ul>
                        <li>
                            <a href=<?php echo '"' . get_home_url(). '"';?> class="media-obj media-obj--center"><span class="media-obj--figure icon"><svg aria-hidden="true"><use xlink:href="#icon--home"></use></svg></span><span class="media-obj--body">Home</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="media-obj media-obj--center" id="nav-weather-stories"><span class="media-obj--figure icon"><svg aria-hidden="true"><use xlink:href="#icon--stories"></use></svg></span><span class="media-obj--body">Weather Stories</span></a>
                        </li>
                        <li>
                            <a href=<?php echo '"' . get_home_url(). '/hazards"';?> class="media-obj media-obj--center"><span class="media-obj--figure icon"><svg aria-hidden="true"><use xlink:href="#icon--hazards"></use></svg></span><span class="media-obj--body">Weather Hazards</span></a>
                        </li>
                        <li>
                            <a href=<?php echo '"' . get_home_url(). '/climate"';?> class="media-obj media-obj--center"><span class="media-obj--figure icon"><svg aria-hidden="true"><use xlink:href="#icon--climate"></use></svg></span><span class="media-obj--body">Climate</span></a>
                        </li>
                        <li>
                            <a href=<?php echo '"' . get_home_url(). '/about"';?> class="media-obj media-obj--center"><span class="media-obj--figure icon"><svg aria-hidden="true"><use xlink:href="#icon--about"></use></svg></span><span class="media-obj--body">About Us</span></a>
                        </li>
                        <li>
                            <a href=<?php echo '"' . get_home_url(). '/get-involved"';?> class="media-obj media-obj--center nav--get-involved"><span class="media-obj--figure icon"><svg aria-hidden="true"><use xlink:href="#icon--involved"></use></svg></span><span class="media-obj--body">Get Involved</span></a>
                        </li>
                    </ul>
                </nav>
            </div><!-- end .show-menu -->
           
 
        </header>
        
         <nav>
                <div id="stories-nav">
                        <a class="close-x" data-toggle="#stories-nav" data-active="#nav-weather-stories" href="#"><span></span></a>
                        <div class="pa3">
                            
                            <div class="nav-unit mb4 bb pb4 mt4 b--tan">
                                <div class="media-obj media-obj--center mb2">
                                    <div class="media-obj--figure"><span class="icon"><svg aria-hidden="true"><use xlink:href="#icon--iowa"></use></svg></span></div>
                                    <div class="media-obj--body"><h3 class="f-small mb0 f-tan-light">Explore Stories By County</h3></div>
                                </div>
<!--                                <input id="counties-ac"/>-->
                                <select class="county-search input-reset" data-placeholder="Select a county">
                                <option></option>
                              <?php

                                 $counties = get_terms( array(
                                    'taxonomy' => 'county',
                                    'hide_empty' => false,
                                ) );

                                foreach ($counties as $county) {
                                    echo '<option value="' . get_home_url() . '/county/' . $county->slug . '">' . $county->name . '</option>';
                                }

                                ?> 

                                </select>
                            </div>
                            
                            <div class="nav-unit mb4 bb pb4 b--tan">
                                <div class="media-obj media-obj--center mb2">
                                    <div class="media-obj--figure"><span class="icon"><svg aria-hidden="true"><use xlink:href="#icon--iowa"></use></svg></span></div>
                                    <div class="media-obj--body"><h3 class="f-small mb0 f-tan-light">Explore Stories By Region</h3></div>
                                </div>
                                <select class="styled-select input-reset" data-placeholder="Select a region">
                                    <option></option>
                              <?php

                                 $regions = get_terms( array(
                                    'taxonomy' => 'region',
                                    'hide_empty' => false,
                                ) );

                                foreach ($regions as $region) {
                                    echo '<option value="' . get_home_url() . '/region/' . $region->slug . '">' . $region->name . '</option>';
                                }

                                ?> 

                                </select>
                            </div>
                            
                            <div class="nav-unit mb4 pb4">
                                <div class="media-obj media-obj--center mb2">
                                    <div class="media-obj--figure"><span class="icon"><svg aria-hidden="true"><use xlink:href="#icon--hazards"></use></svg></span></div>
                                    <div class="media-obj--body"><h3 class="f-small mb0 f-tan-light">Explore Stories By Weather Hazards</h3></div>
                                </div>
                                <select class="styled-select input-reset" data-placeholder="Select a weather hazard">
                                    <option></option>
                              <?php

                                 $hazards = get_terms( array(
                                    'taxonomy' => 'hazard',
                                    'hide_empty' => false,
                                ) );

                                foreach ($hazards as $hazard) {
                                    echo '<option value="' . get_home_url() . '/hazard/' . $hazard->slug . '">' . $hazard->name . '</option>';
                                }

                                ?>                                     

                                </select>
                            </div>
                            
                        </div>
                    </div>
            </nav>