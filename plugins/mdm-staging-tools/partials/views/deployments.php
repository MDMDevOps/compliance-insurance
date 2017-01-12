<?php foreach( $deployments as $deployment ) : ?>
<table id="pull-history" class="wp-list-table widefat fixed striped">
    <thead>
        <th>Push</th>
        <th>Time</th>
        <th>Author</th>
        <th>Commits</th>
    </thead>
    <tbody>
        <tr>
            <td><a href="<?php echo esc_url_raw( $deployment['head']['url'] ); ?>" target="_blank">Push to master on <?php echo $deployment['repo']['name']; ?></a></td>
            <td>{{put time here}}</td>
            <td><img style="float: left;" class="commit-avatar" src="<?php echo esc_url_raw( $deployment['author']['avatar'] ); ?>" width="20px" height="20px" />&nbsp;<?php echo $deployment['author']['name']; ?></td>
            <td>
                <ul>
                    <?php foreach( $deployment['commits'] as $commit ) : ?>
                         <li><a href="<?php echo $commit['url'];?>" target="_blank"><?php echo $commit['message'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </td>
        </tr>
    </tbody>
</table>
<?php endforeach; ?>

