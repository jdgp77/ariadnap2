<?php

namespace Drupal\ariadna_spotify\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\ariadna_spotify\SpotifyQueryServiceInterface;

/**
 * Class SpotifyController.
 */
class SpotifyController extends ControllerBase {

  /**
   * The renderer.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * Constructs a new EntityController.
   *
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   * @param \Drupal\Core\Entity\EntityTypeBundleInfoInterface $entity_type_bundle_info
   *   The entity type bundle info.
   * @param \Drupal\Core\Entity\EntityRepositoryInterface $entity_repository
   *   The entity repository.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer.
   * @param \Drupal\Core\StringTranslation\TranslationInterface $string_translation
   *   The string translation.
   * @param \Drupal\Core\Routing\UrlGeneratorInterface $url_generator
   *   The url generator.
   */
  public function __construct(SpotifyQueryServiceInterface $spotifyQuery) {
    $this->spotifyQuery = $spotifyQuery;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('ariadna_spotify.query'),
    );
  }
  /**
   * Latestalbums.
   *
   * @return string
   *   Return Hello string.
   */
  public function latestAlbums() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: latestAlbums')
    ];
  }
  /**
   * Artist.
   *
   * @return string
   *   Return Hello string.
   */
  public function artist($id) {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: artist with parameter(s): $id'),
    ];
  }

}
