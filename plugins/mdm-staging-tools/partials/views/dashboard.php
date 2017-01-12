<div class="wrap <?php echo sprintf( '%s_dashboard', $this->plugin_name ); ?>">
    <div class="bootstrapped">
        <div class="clearfix">
            <div class="row">
                <div class="col-sm-8">
                    <div class="mdmpanel mdmcard">
                        <header class="card-header"><H2><span class="staginglogo"></span> Commits</H2></header>
                        <div class="card-block">

                            <?php if( !empty( $commits ) ) : ?>
                                <table class="table widefat table-striped fixed">
                                    <thead>
                                        <tr>
                                            <th>Message</th>
                                            <th>Date</th>
                                            <th>Author</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach( $commits as $index => $commit ) : ?>
                                    <tr>

                                        <td><a href="<?php echo esc_url_raw( $commit['html_url'] ); ?>"><?php echo $commit['commit']['message']; ?></a></td>
                                        <td><?php echo date( 'F j, Y, g:i a', strtotime( $commit['commit']['committer']['date'] ) ) ?></td>
                                        <td><a href="<?php echo esc_url_raw( $commit['author']['html_url'] ); ?>" target="_blank"><img src="<?php echo esc_url_raw( $commit['author']['avatar_url'] ); ?>" height="20px" width="20px" style="vertical-align: top;" >&nbsp;<?php echo $commit['author']['login']; ?></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="mdmpanel mdmcard">
                        <header class="card-header"><H2><span class="staginglogo"></span> Issues</H2></header>
                        <div class="card-block">
                            <p class="count"><?php echo count( $issues ); ?> Issues</p>
                            <?php if( !empty( $issues ) ) : ?>
                                <table class="table table-bordered widefat table-striped">
                                    <thead>
                                        <tr>
                                            <th>Issue</th>
                                            <th>Tags</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php foreach( $issues as $index => $issue ) : ?>
                                    <tr class="<?php echo $issue['state']; ?>">

                                        <td><a href="<?php echo esc_url_raw( $issue['html_url'] ); ?>" target="_blank"><?php echo $issue['title']; ?></a></td>
                                        <td>
                                            <?php foreach( $issue['labels'] as $label ) : ?>
                                                <span class="issue-label <?php echo $label['name'] ?>" style="background-color : <?php printf( '#%s', $label['color'] ); ?>;"><?php echo $label['name'] ; ?></span>
                                            <?php endforeach; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
