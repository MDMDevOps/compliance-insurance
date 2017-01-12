<table class="wp-list-table widefat striped mdmpanel-table">
    <thead>
        <tr>
            <th>Date</th>
            <th>User</th>
            <th>Hash</th>
            <th>Message</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach( $history as $deployment ) : ?>
            <tr>
                <td><?php echo $deployment['date']; ?></td>
                <td><?php echo $deployment['author']; ?></td>
                <td><?php echo $deployment['hash']; ?></td>
                <td><?php echo $deployment['message']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
