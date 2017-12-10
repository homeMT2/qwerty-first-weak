<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>File Manager</title>

        <link rel='stylesheet' href='<?php echo $config['site_url']; ?>/public/css/style.css?<?php echo rand(1, 9999); ?>'>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    </head>

    <body>
    <h1>File Manager</h1>

    <table>
        <thead>
            <tr>

                <td>
                    #
                </td>

                <td>
                    Name
                </td>

                <td>
                    Size
                </td>

                <td>
                    URL
                </td>

            </tr>
        </thead>

        <tbody>
            <?php for( $i = 0; $i < count( $files ); $i++ ) : ?>
                <tr>

                    <td>
                        <?php echo $i + 1; ?>
                    </td>

                    <td>
                        <?php echo $files[$i]; ?>
                    </td>

                    <td>
                        <?php echo $sizes[$i]; ?>
                    </td>

                    <td>
                        <a href="<?php echo $urls[$i] ?>">
                            <?php echo rawurldecode( $urls[$i] ); ?>
                        </a>
                    </td>

                </tr>
            <?php endfor; ?>
        </tbody>
    </table>

    </body>
</html>