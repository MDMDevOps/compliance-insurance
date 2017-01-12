<?php if( !empty( $field['label'] ) ) : ?>
    <label for="<?php echo $field['field_id']; ?>"><?php echo $field['label']; ?></label>
<?php endif; ?>

<textarea  class="<?php echo esc_attr( $field['field_class'] ); ?>"  id="<?php echo $field['field_id']; ?>" name="<?php echo$field['field_id'] ?>" cols="30" rows="10"><?php echo esc_attr( $field['value'] ); ?></textarea>

<?php if( !empty( $field['description'] ) ) : ?>
    <span class="description"><?php echo $field['description'] ?></span>
<?php endif; ?>