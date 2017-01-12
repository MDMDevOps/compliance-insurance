<?php
/**
 * The markup to display the settings page
 * @author  Mid-West Family Marketing
 * @link    http://midwestfamilymarketing.com
 * @since   1.0.0
 */
?>

<?php do_action( 'environment_setup' ); ?>

<div class="wrap <?php echo sprintf( '%s_settings', $this->plugin_name ); ?>">
    <h2>Project Settings</h2>
    <hr class="mdmhr">
    <div class="mdmpanel">
        <form method="post" action="options.php">
            <?php wp_nonce_field( 'update-options' ); ?>
            <?php settings_fields( $this->plugin_name ); ?>
            <?php do_settings_sections( $this->plugin_name ); ?>
            <?php submit_button(); ?>
        </form>
    </div>
</div>

<div class="wrap <?php echo sprintf( '%s_settings', $this->plugin_name ); ?>">
    <h2>Git Status</h2>
    <hr class="mdmhr">
    <div id="gitstatus" class="mdmpanel">
        <?php $this->expose( shell_exec( sprintf( 'cd %s && git status', ABSPATH ) ) ); ?>
    </div>
</div>

<div class="wrap <?php echo sprintf( '%s_settings', $this->plugin_name ); ?>">
    <h2>Git Log</h2>
    <hr class="mdmhr">
    <?php do_action( 'git_history' ); ?>
</div>


<div class="wrap">
    <div id="gitstatus" class="mdmpanel">
        <?php $this->expose( shell_exec( sprintf( 'cd %s && git status', ABSPATH ) ) ); ?>
    </div>
    <div id="git" class="mdmpanel">
        <h2>History</h2>
        <?php do_action( 'git_history' ); ?>
    </div>
</div>
<div class="wrap">
    <?php do_action( 'git_history' ); ?>
</div>


<div class="api-instructions">
    <h4>To update a theme from a git repo:</h4>
    <ol>
        <li>Set up both local and remote repos</li>
        <li>Set up a webhook on push, that points to the url <code><?php echo home_url( '/wp-json/gitupdate/v1/themes/{{THEME NAME}}' ); ?></code></li>
    </ol>
    <p>
        The repo will publish to this webhook everytime a push is made on branch Master, enabling git based depoloyment
    </p>
    <?php
        $branch = shell_exec( sprintf( "cd %s && git symbolic-ref HEAD | cut -d'/' -f3", ABSPATH ) );
        $pointer = sprintf( '<span class="pointer"><span class="path">~%s</span> -> Branch: <span class="branch">%s : </span></span>', ABSPATH, $branch );

    ?>
    <div id="terminal">
        <div id="shell">

            <form class="input">
                <div class="pointer">
                    <label for="command"><?php echo $pointer; ?></label>
                </div>
                <div class="commands">
                    <input type="text" name="command" id="command">
                </div>
            </form>
        </div>

    </div>
    <?php
    // $results = '';
    $branch = shell_exec( sprintf( "cd %s && git symbolic-ref HEAD | cut -d'/' -f3", ABSPATH ) );
    var_dump(ABSPATH);
    // $results .= shell_exec( sprintf( 'cd %s && git status', ABSPATH ) );
    // $results .= shell_exec( sprintf( 'cd %s && git add --all', ABSPATH ) );
    // $results .= shell_exec( sprintf( 'cd %s && git commit -m "%s"', ABSPATH, 'Update' ) );
    // $results .= shell_exec( sprintf( 'cd %s && git rebase origin/master', ABSPATH ) );
    // // $results .= shell_exec( sprintf( 'cd %s && git checkout master', ABSPATH ) );
    // // $results .= shell_exec( sprintf( 'cd %s && git merge %s', ABSPATH, $branch ) );
    // // $results .= shell_exec( sprintf( 'cd %s && git push origin master', ABSPATH ) );
    // // $results .= shell_exec( sprintf( 'cd %s && git checkout %s', ABSPATH, $branch ) );
    // $this->expose( $results );
        ?>
    <?php
        $config = file_get_contents( ABSPATH . '.git/config' );
        if( strpos( $config, '[merge "ours"]' ) === false ) {
            echo 'Not configured';
            $config  = $config . "\n";
            $config .= '[merge "ours"]' . "\n";
            $config .= '    name = "Keep ours merge"' . "\n";
            $config .= '    driver = true' . "\n";
            file_put_contents( ABSPATH . '.git/config', $config );
            $this->expose( file_get_contents( ABSPATH . '.git/config' ) );
        } else {
            echo "Configured";
        }
        $history = array();
        exec( sprintf( 'cd %s && git log -10', ABSPATH ), $output );
        foreach($output as $line){
            $this->expose( $line );
            if(strpos($line, 'commit')===0){
            if(!empty($commit)){
                array_push($history, $commit);
                unset($commit);
            }
            $commit['hash']   = substr($line, strlen('commit'));
            }
            else if(strpos($line, 'Author')===0){
            $commit['author'] = substr($line, strlen('Author:'));
            }
            else if(strpos($line, 'Date')===0){
            $commit['date']   = substr($line, strlen('Date:'));
            }
            else{
            $commit['message']  .= $line;
            }
        }
        $this->expose( $history );
     ?>
</div>

<div id="gitstatus">

</div>

