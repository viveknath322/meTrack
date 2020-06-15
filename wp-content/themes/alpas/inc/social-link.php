<?php global $alpas_opt;
/**
 * Alpas Social Link
 * @package Alpas
*/

    if((isset($alpas_opt['facebook-url']) && $alpas_opt['facebook-url'] !='')
    OR(isset($alpas_opt['twitter-url']) && $alpas_opt['twitter-url'] !='')
    OR(isset($alpas_opt['instagram-url']) && $alpas_opt['instagram-url'] !='')
    OR(isset($alpas_opt['youtube-url']) && $alpas_opt['youtube-url'] !='')
    OR(isset($alpas_opt['linkedin-url']) && $alpas_opt['linkedin-url'] !='')
    ) { ?>
        <ul class="social">
            <?php 
                if(isset($alpas_opt['facebook-url']) && $alpas_opt['facebook-url'] !='') { ?>
                <li><a href="<?php echo esc_url($alpas_opt['facebook-url']); ?>" target="_blank"><i class="flaticon-facebook-letter-logo"></i> </a>
                </li>
            <?php } ?>

            <?php 
                if(isset($alpas_opt['twitter-url']) && $alpas_opt['twitter-url'] !='') { ?>
                <li><a href="<?php echo esc_url($alpas_opt['twitter-url']); ?>" target="_blank"><i class="flaticon-twitter-black-shape"></i> </a>
                </li>
            <?php } ?>
        
            <?php 
                if(isset($alpas_opt['instagram-url']) && $alpas_opt['instagram-url'] !='') { ?>
                <li><a href="<?php echo esc_url($alpas_opt['instagram-url']); ?>" target="_blank"><i class="flaticon-instagram-logo"></i> </a>
                </li>
            <?php } ?>
            
            <?php 
                if(isset($alpas_opt['youtube-url']) && $alpas_opt['youtube-url'] !='') { ?>
                <li><a href="<?php echo esc_url($alpas_opt['youtube-url']); ?>" target="_blank"><i class="flaticon-youtube"></i> </a>
                </li>
            <?php } ?>
            
            <?php 
                if(isset($alpas_opt['linkedin-url']) && $alpas_opt['linkedin-url'] !='') { ?>
                <li><a href="<?php echo esc_url($alpas_opt['linkedin-url']); ?>" target="_blank"><i class="flaticon-linkedin-letters"></i> </a>
                </li>
            <?php } ?>
        </ul>	
<?php } ?>
