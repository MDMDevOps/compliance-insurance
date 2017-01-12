<?php foreach( $deployments as $deployment ) : ?>

<h4><a href="<?php echo $deployment['compare'] ?>" target="_blank">Push to Master : <?php echo $deployment['after']; ?></a></h4>
<table id="pull-history" class="wp-list-table widefat fixed striped">
    <thead>
        <th>Time</th>
        <th>Author</th>
        <th>Commit</th>
    </thead>
    <tbody>
        <?php foreach( $deployment['commits'] as $commit ) : ?>
            <tr>
                <td><?php echo $commit['timestamp']; ?></td>
                <td><?php echo $commit['author']['name']; ?></td>
                <td><a href="<?php echo $commit['url'];?>" target="_blank"><?php echo $commit['message'] ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endforeach; ?>