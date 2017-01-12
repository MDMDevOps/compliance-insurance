<?php if( !empty( $field['label'] ) ) : ?>
    <label for="<?php echo $field['field_id']; ?>"><?php echo $field['label']; ?></label>
<?php endif; ?>

<input type="number" class="<?php echo esc_attr( $field['field_class'] ); ?>"  id="<?php echo $field['field_id']; ?>" name="<?php echo$field['field_id'] ?>" value="<?php echo esc_attr( $field['value'] ); ?>" placeholder="<?php echo $field['placeholder']; ?>">

<?php if( !empty( $field['description'] ) ) : ?>
    <span class="description"><?php echo $field['description'] ?></span>
<?php endif; ?>