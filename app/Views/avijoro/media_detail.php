<!-- Ajout d'une marge haute de 2.5rem pour éviter que le header ne cache le contenu -->
<div class="main-content-wrapper" style="background-color: #f9fafb; font-family: system-ui, -apple-system, sans-serif; box-sizing: border-box; width: 100%; clear: both; padding: 2.5rem 0 4rem 0;">
    <div style="max-width: 900px; margin: 0 auto; padding: 0 1.5rem; box-sizing: border-box; width: 100%;">

        <!-- BOUTON RETOUR SUPÉRIEUR ALIGNÉ -->
        <div style="padding-bottom: 1.5rem; text-align: left;">
            <a href="<?= base_url($lang . '/media') ?>" style="color: #1a7bb9; text-decoration: none; font-weight: 600; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; padding: 0.5rem 1.2rem; border-radius: 9999px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #e5e7eb;">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                <?= lang('Texte.media_btn_retour') ?>
            </a>
        </div>

        <!-- LE GRAND RECTANGLE DE VISIONNAGE BIEN VISIBLE -->
        <div style="background: #ffffff; border-radius: 1rem; overflow: hidden; box-shadow: 0 10px 25px -5px rgba(0,0,0,0.05); border: 1px solid #e5e7eb; box-sizing: border-box; width: 100%; margin-bottom: 2rem;">
            
            <!-- Zone Multimédia : Un rectangle net et spacieux de 480px de haut -->
            <div style="background: #000000; width: 100%; height: 480px; display: flex; justify-content: center; align-items: center; overflow: hidden; position: relative;">
                
                <?php if ($media['type'] === 'video'): ?>
                    <!-- LECTEUR VIDÉO GRAND FORMAT CINÉMA -->
                    <video controls poster="<?= esc($media['miniature']) ?>" style="width: 100%; height: 100%; display: block; object-fit: contain; background: #000000;">
                        <source src="<?= esc($media['chemin_complet']) ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>

                <?php elseif ($media['type'] === 'document'): ?>
                    <!-- ZONE DOCUMENT / LECTEUR PDF -->
                    <div style="text-align: center; padding: 2rem; color: #ffffff; width: 100%; height: 100%; display: flex; flex-direction: column; box-sizing: border-box;">
                        <h3 style="margin: 0 0 1rem 0; font-size: 1.2rem; font-family: monospace; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #ffffff;">
                            <?= esc($media['fichier']) ?>
                        </h3>
                        <div style="margin-bottom: 1rem;">
                            <a href="<?= esc($media['chemin_complet']) ?>" target="_blank" style="display: inline-flex; align-items: center; gap: 0.4rem; background-color: #3b82f6; color: #ffffff; padding: 0.6rem 1.4rem; border-radius: 0.375rem; text-decoration: none; font-weight: 600; font-size: 0.85rem; box-shadow: 0 4px 6px rgba(59,130,246,0.2);">
                                📥 <?= lang('Texte.media_ouvrir_telecharger') ?>
                            </a>
                        </div>
                        <div style="flex: 1; width: 100%; background: #ffffff; border-radius: 0.5rem; overflow: hidden;">
                            <embed src="<?= esc($media['chemin_complet']) ?>" type="application/pdf" width="100%" height="100%" />
                        </div>
                    </div>

                <?php else: ?>
                    <!-- GRANDE PHOTO INTEGRALE SANS PERTE -->
                    <img src="<?= esc($media['chemin_complet']) ?>" alt="<?= esc($media['titre']) ?>" style="width: 100%; height: 100%; object-fit: contain; display: block;" />
                <?php endif; ?>

            </div>

            <!-- ZONE LÉGENDE REPOSITIONNÉE ET PROPRE -->
            <div style="padding: 2rem; box-sizing: border-box; background: #ffffff;">
                
                <!-- Titre + Badge -->
                <div style="display: flex; align-items: center; gap: 1rem; margin-bottom: 0.75rem; flex-wrap: wrap;">
                    <h1 style="font-size: 1.75rem; font-weight: 700; color: #111827; margin: 0; line-height: 1.2; letter-spacing: -0.02em;">
                        <?= esc($media['titre']) ?>
                    </h1>
                    <span style="background-color: #e6f4ea; color: #1b8a4f; padding: 0.25rem 0.6rem; border-radius: 6px; font-size: 0.75rem; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em;">
                        <?php 
                        if ($media['type'] === 'video') echo lang('Texte.media_filtre_videos');
                        elseif ($media['type'] === 'document') echo lang('Texte.media_filtre_documents');
                        else echo lang('Texte.media_filtre_photos');
                        ?>
                    </span>
                </div>
                
                <!-- Description textuelle -->
                <p style="color: #4b5563; font-size: 1.05rem; line-height: 1.6; text-align: justify; margin: 0;">
                    <?= nl2br(esc($media['description'])) ?>
                </p>
            </div>

        </div>

        <!-- BOUTON RETOUR INFÉRIEUR -->
        <div style="text-align: left; padding-top: 0.5rem;">
            <a href="<?= base_url($lang . '/media') ?>" style="color: #1a7bb9; text-decoration: none; font-weight: 600; font-size: 0.85rem; display: inline-flex; align-items: center; gap: 0.4rem; background: #ffffff; padding: 0.5rem 1.2rem; border-radius: 9999px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); border: 1px solid #e5e7eb;">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                <?= lang('Texte.media_btn_retour') ?>
            </a>
        </div>

    </div>
</div>
<div style="clear: both;"></div>
