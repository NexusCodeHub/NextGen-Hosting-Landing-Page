<?php
require_once 'config/init.php';
?>
<!DOCTYPE html>
<html lang="<?php echo $lang->getCurrentLang(); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo t('footer.company.name'); ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="nav3d">
        <div class="menu-container">
            <div class="lang-switcher">
                <?php foreach ($lang->getAvailableLangs() as $langCode): ?>
                    <a href="?lang=<?php echo $langCode; ?>" 
                       class="lang-link <?php echo $lang->getCurrentLang() === $langCode ? 'active' : ''; ?>">
                        <?php echo strtoupper($langCode); ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <ul>
                <li><a href="#home" data-lang-content="nav.home"><?php echo t('nav.home'); ?></a></li>
                <li><a href="#services" data-lang-content="nav.services"><?php echo t('nav.services'); ?></a></li>
                <li><a href="#pricing" data-lang-content="nav.pricing"><?php echo t('nav.pricing'); ?></a></li>
                <li><a href="#about" data-lang-content="nav.about"><?php echo t('nav.about'); ?></a></li>
                <li><a href="#contact" data-lang-content="nav.contact"><?php echo t('nav.contact'); ?></a></li>
            </ul>
        </div>
    </nav>

    <main>
        <section id="hero">
            <h1 data-lang-content="hero.title"><?php echo t('hero.title'); ?></h1>
            <p data-lang-content="hero.subtitle"><?php echo t('hero.subtitle'); ?></p>
            <div class="cta-container">
                <button class="cta-button primary" data-lang-content="hero.cta_primary"><?php echo t('hero.cta_primary'); ?></button>
                <button class="cta-button secondary" data-lang-content="hero.cta_secondary"><?php echo t('hero.cta_secondary'); ?></button>
            </div>
        </section>

        <section id="features">
            <h2 class="section-title" data-lang-content="features.title"><?php echo t('features.title'); ?></h2>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="icon">🚀</div>
                    <h3 data-lang-content="features.uptime.title"><?php echo t('features.uptime.title'); ?></h3>
                    <p data-lang-content="features.uptime.description"><?php echo t('features.uptime.description'); ?></p>
                </div>
                <div class="feature-card">
                    <div class="icon">💾</div>
                    <h3 data-lang-content="features.storage.title"><?php echo t('features.storage.title'); ?></h3>
                    <p data-lang-content="features.storage.description"><?php echo t('features.storage.description'); ?></p>
                </div>
                <div class="feature-card">
                    <div class="icon">🛡️</div>
                    <h3 data-lang-content="features.support.title"><?php echo t('features.support.title'); ?></h3>
                    <p data-lang-content="features.support.description"><?php echo t('features.support.description'); ?></p>
                </div>
            </div>
        </section>

        <section id="pricing">
            <h2 class="section-title" data-lang-content="pricing.title"><?php echo t('pricing.title'); ?></h2>
            <div class="pricing-grid">
                <?php foreach (['starter', 'professional', 'enterprise'] as $plan): ?>
                    <div class="pricing-card <?php echo $plan === 'professional' ? 'popular' : ''; ?>">
                        <?php if ($plan === 'professional'): ?>
                            <div class="popular-badge" data-lang-content="pricing.popular"><?php echo t('pricing.popular'); ?></div>
                        <?php endif; ?>
                        <h3 data-lang-content="pricing.plans.<?php echo $plan; ?>.name"><?php echo t("pricing.plans.{$plan}.name"); ?></h3>
                        <div class="price">
                            €<?php echo t("pricing.plans.{$plan}.price"); ?>
                            <span data-lang-content="pricing.plans.<?php echo $plan; ?>.period"><?php echo t("pricing.plans.{$plan}.period"); ?></span>
                        </div>
                        <ul>
                            <?php foreach (t("pricing.plans.{$plan}.features") as $feature): ?>
                                <li data-lang-content="pricing.plans.<?php echo $plan; ?>.features"><?php echo $feature; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button class="price-button" data-lang-content="pricing.cta"><?php echo t('pricing.cta'); ?></button>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

        <section id="about">
            <h2 class="section-title" data-lang-content="about.title"><?php echo t('about.title'); ?></h2>
            <div class="about-grid">
                <div class="about-content">
                    <h3 data-lang-content="about.subtitle"><?php echo t('about.subtitle'); ?></h3>
                    <p data-lang-content="about.description"><?php echo t('about.description'); ?></p>
                    <div class="stats-grid">
                        <?php foreach (['customers', 'uptime', 'support'] as $stat): ?>
                            <div class="stat-item">
                                <span class="stat-number" data-lang-content="about.stats.<?php echo $stat; ?>.number"><?php echo t("about.stats.{$stat}.number"); ?></span>
                                <span class="stat-label" data-lang-content="about.stats.<?php echo $stat; ?>.label"><?php echo t("about.stats.{$stat}.label"); ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact">
            <h2 class="section-title" data-lang-content="contact.title"><?php echo t('contact.title'); ?></h2>
            <div class="contact-container">
                <form class="contact-form">
                    <div class="form-group">
                        <input type="text" placeholder="<?php echo t('contact.form.name'); ?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="<?php echo t('contact.form.email'); ?>" required>
                    </div>
                    <div class="form-group">
                        <select required>
                            <option value="" data-lang-content="contact.form.subject.label"><?php echo t('contact.form.subject.label'); ?></option>
                            <?php foreach (t('contact.form.subject.options') as $value => $label): ?>
                                <option value="<?php echo $value; ?>" data-lang-content="contact.form.subject.options"><?php echo $label; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea placeholder="<?php echo t('contact.form.message'); ?>" required></textarea>
                    </div>
                    <button type="submit" class="submit-button" data-lang-content="contact.form.submit"><?php echo t('contact.form.submit'); ?></button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4 data-lang-content="footer.company.name"><?php echo t('footer.company.name'); ?></h4>
                <p data-lang-content="footer.company.description"><?php echo t('footer.company.description'); ?></p>
                <div class="social-links">
                    <a href="#" class="social-link">Twitter</a>
                    <a href="#" class="social-link">LinkedIn</a>
                    <a href="#" class="social-link">GitHub</a>
                </div>
            </div>
            <div class="footer-section">
                <h4 data-lang-content="footer.links.title"><?php echo t('footer.links.title'); ?></h4>
                <ul>
                    <?php foreach (t('footer.links.items') as $href => $label): ?>
                        <li><a href="#<?php echo $href; ?>" data-lang-content="footer.links.items"><?php echo $label; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="footer-section">
                <h4 data-lang-content="footer.contact_info.title"><?php echo t('footer.contact_info.title'); ?></h4>
                <p>Email: <?php echo t('footer.contact_info.email'); ?></p>
                <p>Tel: <?php echo t('footer.contact_info.phone'); ?></p>
                <p data-lang-content="footer.contact_info.address"><?php echo t('footer.contact_info.address'); ?></p>
            </div>
        </div>
        <div class="footer-bottom">
            <p data-lang-content="footer.copyright"><?php echo t('footer.copyright'); ?></p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>