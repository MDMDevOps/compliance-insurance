<label for="<?php echo $field['field_id']; ?>"><input type="checkbox" class="<?php echo esc_attr( $field['field_class'] ); ?>" name="<?php echo $field['field_id']; ?>" value="<?php echo $field['value']; ?>" <?php echo $field['state']; ?>>&nbsp;<?php echo $field['label']; ?></label>

<?php if( !empty( $field['description'] ) ) : ?>
    <span class="description"><?php echo $field['description']; ?></span>
<?php endif; ?>