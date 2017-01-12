<?php if( !empty( $field['label'] ) ) : ?>
    <label for="<?php echo $field['field_id']; ?>"><?php echo $field['label']; ?></label>
<?php endif; ?>

<select class="widefat" name="<?php echo $field['field_id']; ?>" id="<?php echo $field['field_id']; ?>">
    <?php foreach( $field['options'] as $option ) : ?>
        <option value="<?php echo $option['value'] ?>" <?php echo $option['selected'] ?>><?php echo $option['label'] ?></option>
    <?php endforeach; ?>
</select>

<?php if( !empty( $field['description'] ) ) : ?>
    <span class="description"><?php echo $field['description'] ?></span>
<?php endif; ?>