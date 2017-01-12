

<div class="input-group mdm-password-field">
      <input type="password" class="<?php echo esc_attr( $field['field_class'] ); ?>"  id="<?php echo $field['field_id']; ?>" name="<?php echo$field['field_id'] ?>" value="<?php echo esc_attr( $field['value'] ); ?>" placeholder="<?php echo $field['placeholder']; ?>">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">Show</button>
      </span>
</div>

<?php if( !empty( $field['description'] ) ) : ?>
    <span class="description"><?php echo $field['description'] ?></span>
<?php endif; ?>