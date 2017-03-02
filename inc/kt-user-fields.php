<?php 
/**
 * Additional user profile fields
 *
 * @package hedmark
 * @since 	hedmark 1.0
**/

function hedmark_social_profile_fields( $user ) {
?>
    <h3><?php esc_html_e('Social Profiles', 'hedmark'); ?></h3>
    
    <table class="form-table">
        <tr>
            <th>
            	<label for="kttwitter"><?php esc_html_e('Twitter', 'hedmark'); ?>
            	</label>
            </th>
            <td>
                <input type="text" name="kttwitter" id="kttwitter" value="<?php echo esc_attr( get_the_author_meta( 'kttwitter', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th>
            	<label for="ktfacebook"><?php esc_html_e('Facebook', 'hedmark'); ?>
            	</label>
            </th>
            <td>
                <input type="text" name="ktfacebook" id="ktfacebook" value="<?php echo esc_attr( get_the_author_meta( 'ktfacebook', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th>
            	<label for="ktgoogle"><?php esc_html_e('Google+', 'hedmark'); ?>
            	</label>
            </th>
            <td>
                <input type="text" name="ktgoogle" id="ktgoogle" value="<?php echo esc_attr( get_the_author_meta( 'ktgoogle', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th>
            	<label for="ktpinterest"><?php esc_html_e('Pinterest', 'hedmark'); ?>
            	</label>
            </th>
            <td>
                <input type="text" name="ktpinterest" id="ktpinterest" value="<?php echo esc_attr( get_the_author_meta( 'ktpinterest', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th>
            	<label for="ktlinkedin"><?php esc_html_e('LinkedIn', 'hedmark'); ?>
            	</label>
            </th>
            <td>
                <input type="text" name="ktlinkedin" id="ktlinkedin" value="<?php echo esc_attr( get_the_author_meta( 'ktlinkedin', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
        <tr>
            <th>
                <label for="ktinstagram"><?php esc_html_e('Instagram', 'hedmark'); ?>
                </label>
            </th>
            <td>
                <input type="text" name="ktinstagram" id="ktinstagram" value="<?php echo esc_attr( get_the_author_meta( 'ktinstagram', $user->ID ) ); ?>" class="regular-text" />
            </td>
        </tr>
    </table>
<?php }
 
function save_hedmark_social_profile_fields( $user_id ) {
    
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;
    
    update_user_meta( $user_id, 'kttwitter', $_POST['kttwitter'] );
	update_user_meta( $user_id, 'ktfacebook', $_POST['ktfacebook'] );
	update_user_meta( $user_id, 'ktgoogle', $_POST['ktgoogle'] );
	update_user_meta( $user_id, 'ktpinterest', $_POST['ktpinterest'] );
	update_user_meta( $user_id, 'ktlinkedin', $_POST['ktlinkedin'] );
    update_user_meta( $user_id, 'ktinstagram', $_POST['ktinstagram'] );
}
 
add_action( 'show_user_profile', 'hedmark_social_profile_fields' );
add_action( 'edit_user_profile', 'hedmark_social_profile_fields' );
 
add_action( 'personal_options_update', 'save_hedmark_social_profile_fields' );
add_action( 'edit_user_profile_update', 'save_hedmark_social_profile_fields' );
