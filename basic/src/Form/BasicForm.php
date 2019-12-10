<?php

namespace Drupal\basic\Form; 

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;


class BasicForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'basic_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your Full Name'),
    ];


    $form['age'] = [
      '#type' => 'number',
      '#title' => $this->t('Age'),
    ];    

    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => array(
      	'male' => $this->t('Male'),
      	'female' => $this->t('Female'),
      	'other' => $this->t('Others'),
      	'N/A' => $this->t('Rather not say'),
      )
    ];

    $form['dateofbirth'] = [
      '#type' => 'date',
      '#title' => $this->t('Enter your Date of Birth'),
    ];

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t('Your name is @name', ['@name' => $form_state->getValue('name')]));
    $this->messenger()->addStatus($this->t('Your age is @age', ['@age' => $form_state->getValue('age') ]));
    $this->messenger()->addStatus($this->t('Your gender is @gender', ['@gender' => $form_state->getValue('gender') ]));
    $this->messenger()->addStatus($this->t('Your Date of Birth is @dateofbirth', ['@dateofbirth' => $form_state->getValue('dateofbirth') ]));

  }


}