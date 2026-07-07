<?php
/**
 * Front Page Template — Salon Win
 * Strona główna z: hero, własną rezerwacją, pobytem, eventami, atrakcjami regionu, opiniami, galerią, lokalizacją, newsletterem
 */

get_header();

$booking_url   = get_option( 'sw_booking_url', 'https://www.booking.com/index.pl.html?aid=304142&label=gen173nr-10CAEoggI46AdIM1gEaLYBiAEBmAEzuAEXyAEM2AED6AEB-AEBiAIBqAIBuALGyr7RBsACAdICJGY4YjBkYTY5LTdkYzgtNDU0Zi1hZTZkLWZjNjBiZjkzYzIxMdgCAeACAQ' );
$booking_is_external = str_starts_with( $booking_url, 'http' );
$phone         = get_option( 'sw_phone',        '13 445 05 90' );
$phone_url     = salon_win_phone_url( $phone );
$email_opt     = get_option( 'sw_email',        'salon-win@salon-win.pl' );
$address       = get_option( 'sw_address',      'ul. Wyspiańskiego 16' );
$postal_code   = get_option( 'sw_postal_code',  '38-200' );
$city          = get_option( 'sw_city',         'Jasło' );
$restaurant_hours = salon_win_restaurant_hours();
$hotel_day     = get_option( 'sw_hotel_day',    '14:00–11:00' );
$full_address  = $address . ', ' . $postal_code . ' ' . $city;
$maps_url      = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode( $full_address );
$maps_fallback = 'https://www.google.com/maps?q=' . rawurlencode( $full_address ) . '&output=embed';
$instagram     = get_option( 'sw_instagram',    '#' );
$facebook      = get_option( 'sw_facebook',     '#' );
$maps_embed    = get_option( 'sw_maps_embed',   '' );
?>

<!-- ============================================================
   HERO
============================================================ -->
<section class="hero" id="hero" aria-labelledby="hero-headline">

    <div class="hero-bg"
         id="hero-bg"
         style="background-image: url('<?php echo esc_url( salon_win_get_image_url( 'sw_image_hero_wine', 'hero-wine.jpg' ) ); ?>');"></div>
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="container">
            <div class="hero-eyebrow fade-up">
                <span class="line" aria-hidden="true"></span>
                <span class="eyebrow"><?php esc_html_e( 'Jasło — wino, pobyt i wydarzenia', 'salon-win' ); ?></span>
            </div>

            <h1 id="hero-headline" class="display-xl hero-headline fade-up delay-1">
                <?php esc_html_e( 'Zostań', 'salon-win' ); ?><br>
                <em><?php esc_html_e( 'na dobry', 'salon-win' ); ?></em><br>
                <?php esc_html_e( 'czas', 'salon-win' ); ?>
            </h1>

            <p class="hero-sub fade-up delay-2">
                <?php esc_html_e( 'Salon Win w Jaśle łączy kameralny hotel, restaurację, degustacje, wesela, sztukę i wyprawy po dziedzictwie Podkarpacia. Zaplanuj stolik, pokój albo cały weekend z naszym zespołem.', 'salon-win' ); ?>
            </p>

            <div class="hero-actions fade-up delay-3">
                <a href="#rezerwacja" class="btn btn-primary">
                    <span><?php esc_html_e( 'Zarezerwuj termin', 'salon-win' ); ?></span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#pobyt" class="btn btn-outline">
                    <span><?php esc_html_e( 'Zobacz pobyt i atrakcje', 'salon-win' ); ?></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Ribbon Stats -->
    <div class="hero-ribbon">
        <div class="container">
            <div class="ribbon-inner">
                <div class="ribbon-stat fade-up delay-1">
                    <span class="stat-number">400+</span>
                    <span class="stat-label"><?php esc_html_e( 'Etykiet w piwniczce', 'salon-win' ); ?></span>
                </div>
                <div class="ribbon-divider" aria-hidden="true"></div>
                <div class="ribbon-stat fade-up delay-2">
                    <span class="stat-number">18</span>
                    <span class="stat-label"><?php esc_html_e( 'Lat gościnności', 'salon-win' ); ?></span>
                </div>
                <div class="ribbon-divider" aria-hidden="true"></div>
                <div class="ribbon-stat fade-up delay-3">
                    <span class="stat-number">5</span>
                    <span class="stat-label"><?php esc_html_e( 'Kierunków pobytu', 'salon-win' ); ?></span>
                </div>
                <div class="ribbon-divider" aria-hidden="true"></div>
                <div class="ribbon-stat fade-up delay-4">
                    <span class="stat-number">48h+</span>
                    <span class="stat-label"><?php esc_html_e( 'Pomysłów na weekend', 'salon-win' ); ?></span>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-scroll" aria-hidden="true">
        <span class="scroll-bar"></span>
        <span><?php esc_html_e( 'Przewiń', 'salon-win' ); ?></span>
    </div>

</section>


<!-- ============================================================
   REZERWACJA
============================================================ -->
<section class="booking-section section" id="rezerwacja" aria-labelledby="booking-heading">
    <div class="container">
        <div class="booking-grid">

            <div class="booking-copy fade-left">
                <span class="eyebrow"><?php esc_html_e( 'Własny system rezerwacyjny', 'salon-win' ); ?></span>
                <h2 id="booking-heading" class="display-md" style="color: var(--color-cream); margin-top: 0.5rem;">
                    <?php esc_html_e( 'Zarezerwuj pobyt, stolik albo wydarzenie', 'salon-win' ); ?>
                </h2>
                <p>
                    <?php esc_html_e( 'Wyślij zapytanie bezpośrednio do zespołu Salon Win. Rezerwacje zapisują się w panelu WordPressa, a gość otrzymuje potwierdzenie e-mail. Obsługujemy stoliki, noclegi, degustacje, wesela, eventy firmowe, heritage trips i kolacje ze sztuką.', 'salon-win' ); ?>
                </p>

                <ul class="booking-features" aria-label="<?php esc_attr_e( 'Możliwości rezerwacji', 'salon-win' ); ?>">
                    <?php
                    $features = [
                        __( 'Stolik w restauracji, degustacja albo kolacja z pairingiem', 'salon-win' ),
                        __( 'Nocleg z planem pobytu na 2-3 dni w regionie', 'salon-win' ),
                        __( 'Wesela, jubileusze i kameralne uroczystości rodzinne', 'salon-win' ),
                        __( 'Eventy firmowe, szkolenia, integracje i premiery produktów', 'salon-win' ),
                        __( 'Heritage trips, sztuka, lokalni twórcy i trasy po okolicy', 'salon-win' ),
                    ];
                    foreach ( $features as $feat ) :
                    ?>
                    <li class="booking-feature">
                        <span class="feature-dot" aria-hidden="true"></span>
                        <?php echo esc_html( $feat ); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <div class="booking-paths" aria-label="<?php esc_attr_e( 'Najczęstsze scenariusze rezerwacji', 'salon-win' ); ?>">
                    <?php
                    $booking_paths = [
                        [ 'icon' => 'fa-utensils',        'title' => __( 'Stolik', 'salon-win' ),       'text' => __( 'Kolacja, degustacja lub spotkanie przy winie.', 'salon-win' ) ],
                        [ 'icon' => 'fa-hotel',           'title' => __( 'Pobyt', 'salon-win' ),        'text' => __( 'Nocleg, restauracja i gotowy plan weekendu.', 'salon-win' ) ],
                        [ 'icon' => 'fa-champagne-glasses','title' => __( 'Wesele', 'salon-win' ),      'text' => __( 'Menu, wino, sala i opieka nad gośćmi.', 'salon-win' ) ],
                        [ 'icon' => 'fa-route',           'title' => __( 'Trip', 'salon-win' ),         'text' => __( 'Winnice, historia, sztuka i Beskid Niski.', 'salon-win' ) ],
                    ];
                    foreach ( $booking_paths as $item ) :
                    ?>
                    <a href="#booking-form" class="booking-path-card">
                        <i class="fas <?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
                        <span>
                            <strong><?php echo esc_html( $item['title'] ); ?></strong>
                            <small><?php echo esc_html( $item['text'] ); ?></small>
                        </span>
                    </a>
                    <?php endforeach; ?>
                </div>

                <p class="body-sm text-muted" style="color: rgba(245,240,232,0.4);">
                    <?php printf(
                        esc_html__( 'Masz pytania? Zadzwoń: %s lub napisz: %s', 'salon-win' ),
                        '<a href="' . esc_url( $phone_url ) . '" style="color:var(--color-gold)">' . esc_html( $phone ) . '</a>',
                        '<a href="mailto:' . esc_attr( $email_opt ) . '" style="color:var(--color-gold)">' . esc_html( $email_opt ) . '</a>'
                    ); ?>
                </p>

                <div class="booking-external">
                    <div>
                        <span class="booking-external-label"><?php esc_html_e( 'Alternatywa dla noclegu', 'salon-win' ); ?></span>
                        <strong><?php esc_html_e( 'Booking.com zostaje jako szybka ścieżka hotelowa', 'salon-win' ); ?></strong>
                    </div>
                    <a href="<?php echo esc_url( $booking_url ); ?>"
                       <?php if ( $booking_is_external ) echo 'target="_blank" rel="noopener noreferrer"'; ?>>
                        <?php esc_html_e( 'Otwórz Booking.com', 'salon-win' ); ?>
                    </a>
                </div>
            </div>

            <div class="booking-form-wrap fade-up delay-2">
                <span class="booking-system-label"><?php esc_html_e( 'Salon Win Reservations', 'salon-win' ); ?></span>
                <h3>
                    <?php esc_html_e( 'Opowiedz nam, czego potrzebujesz', 'salon-win' ); ?>
                </h3>
                <p class="booking-form-lead">
                    <?php esc_html_e( 'Po wysłaniu formularza zgłoszenie trafia do panelu WordPressa i na skrzynkę administratora. Potwierdzimy dostępność lub zaproponujemy najlepszy wariant pobytu.', 'salon-win' ); ?>
                </p>

                <form id="booking-form" class="booking-form" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="booking-name"><?php esc_html_e( 'Imię i nazwisko', 'salon-win' ); ?></label>
                            <input type="text" id="booking-name" name="name" required autocomplete="name">
                        </div>
                        <div class="form-group">
                            <label for="booking-email"><?php esc_html_e( 'E-mail', 'salon-win' ); ?></label>
                            <input type="email" id="booking-email" name="email" required autocomplete="email">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="booking-phone"><?php esc_html_e( 'Telefon', 'salon-win' ); ?></label>
                            <input type="tel" id="booking-phone" name="phone" autocomplete="tel">
                        </div>
                        <div class="form-group">
                            <label for="booking-date"><?php esc_html_e( 'Preferowana data', 'salon-win' ); ?></label>
                            <input type="date" id="booking-date" name="date" required>
                        </div>
                    </div>

                    <div class="form-row form-row--triple">
                        <div class="form-group">
                            <label for="booking-time"><?php esc_html_e( 'Godzina', 'salon-win' ); ?></label>
                            <input type="time" id="booking-time" name="time">
                        </div>
                        <div class="form-group">
                            <label for="booking-guests"><?php esc_html_e( 'Liczba osób', 'salon-win' ); ?></label>
                            <input type="number" id="booking-guests" name="guests" min="1" max="180" value="2">
                        </div>
                        <div class="form-group">
                            <label for="booking-type"><?php esc_html_e( 'Rodzaj', 'salon-win' ); ?></label>
                            <select id="booking-type" name="type">
                                <option value=""><?php esc_html_e( 'Wybierz', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Stolik / restauracja', 'salon-win' ); ?>"><?php esc_html_e( 'Stolik / restauracja', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Degustacja', 'salon-win' ); ?>"><?php esc_html_e( 'Degustacja', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Nocleg i pobyt', 'salon-win' ); ?>"><?php esc_html_e( 'Nocleg i pobyt', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Wesele / uroczystość', 'salon-win' ); ?>"><?php esc_html_e( 'Wesele / uroczystość', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Event firmowy', 'salon-win' ); ?>"><?php esc_html_e( 'Event firmowy', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Heritage trip', 'salon-win' ); ?>"><?php esc_html_e( 'Heritage trip', 'salon-win' ); ?></option>
                                <option value="<?php esc_attr_e( 'Sztuka i kolacja', 'salon-win' ); ?>"><?php esc_html_e( 'Sztuka i kolacja', 'salon-win' ); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="booking-message"><?php esc_html_e( 'Wiadomość', 'salon-win' ); ?></label>
                        <textarea id="booking-message" name="message" placeholder="<?php esc_attr_e( 'Napisz, czy planujesz kolację, nocleg, wesele, event, wycieczkę po regionie albo spotkanie ze sztuką.', 'salon-win' ); ?>"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary booking-submit">
                        <span><?php esc_html_e( 'Wyślij rezerwację', 'salon-win' ); ?></span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>

                    <p class="booking-privacy-note">
                        <?php esc_html_e( 'Wysłanie formularza nie pobiera płatności. Skontaktujemy się, aby potwierdzić szczegóły i dostępność.', 'salon-win' ); ?>
                    </p>
                    <div id="booking-feedback" role="alert" aria-live="polite" style="display:none;" class="body-sm mt-sm"></div>
                </form>
            </div>

        </div>
    </div>
</section>


<!-- ============================================================
   O NAS
============================================================ -->
<section class="about-section section" id="o-nas" aria-labelledby="about-heading">
    <div class="container">
        <div class="about-grid">

            <!-- Image -->
            <div class="about-image-wrap fade-left">
                <img src="<?php echo esc_url( salon_win_get_image_url( 'sw_image_about_salon', 'about-salon.jpg' ) ); ?>"
                     alt="<?php esc_attr_e( 'Wnętrze Salon Win', 'salon-win' ); ?>"
                     class="img-primary"
                     loading="lazy">

                <div class="about-badge">
                    <span class="badge-num">2006</span>
                    <span class="badge-text"><?php esc_html_e( 'Rok otwarcia', 'salon-win' ); ?></span>
                </div>

                <img src="<?php echo esc_url( salon_win_get_image_url( 'sw_image_about_wine', 'about-wine.jpg' ) ); ?>"
                     alt="<?php esc_attr_e( 'Wybór win w Salon Win', 'salon-win' ); ?>"
                     class="img-accent"
                     loading="lazy">
            </div>

            <!-- Copy -->
            <div class="about-copy fade-up delay-1">
                <span class="eyebrow"><?php esc_html_e( 'Nasza historia', 'salon-win' ); ?></span>
                <h2 id="about-heading" class="display-md" style="margin-top: 0.5rem; margin-bottom: var(--space-md);">
                    <?php esc_html_e( 'Pasja do wina od ponad 18 lat', 'salon-win' ); ?>
                </h2>
                <p>
                    <?php esc_html_e( 'Salon Win to miejsce, gdzie miłośnicy wina spotykają się z ekspertami. Od 2006 roku budujemy kolekcję wyselekcjonowanych trunków z Francji, Włoch, Hiszpanii, Argentyny, Chile i wielu innych regionów.', 'salon-win' ); ?>
                </p>
                <p>
                    <?php esc_html_e( 'Nasi certyfikowani sommelierzy pomogą Ci wybrać idealne wino na każdą okazję — od codziennej kolacji po wyjątkowe uroczystości. Prowadzimy regularnie degustacje tematyczne i kursy winiarskie otwarte dla wszystkich.', 'salon-win' ); ?>
                </p>

                <div class="about-highlights">
                    <?php
                    $highlights = [
                        [ 'title' => '400+', 'label' => __( 'Etykiet w ofercie', 'salon-win' ) ],
                        [ 'title' => '4',    'label' => __( 'Certyfikowanych sommelierów', 'salon-win' ) ],
                        [ 'title' => '50+',  'label' => __( 'Degustacji rocznie', 'salon-win' ) ],
                        [ 'title' => '12k+', 'label' => __( 'Zadowolonych gości', 'salon-win' ) ],
                    ];
                    foreach ( $highlights as $item ) :
                    ?>
                    <div class="highlight-item">
                        <span class="h-title"><?php echo esc_html( $item['title'] ); ?></span>
                        <span class="h-label"><?php echo esc_html( $item['label'] ); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <a href="<?php echo esc_url( home_url( '/o-nas' ) ); ?>" class="btn btn-ghost">
                    <span><?php esc_html_e( 'Poznaj naszą historię', 'salon-win' ); ?></span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

        </div>
    </div>
</section>


<!-- ============================================================
   POBYT / OFERTA DOŚWIADCZEŃ
============================================================ -->
<section class="experience-section section" id="pobyt" aria-labelledby="experience-heading">
    <div class="container">
        <div class="section-header experience-header">
            <div class="fade-up">
                <span class="eyebrow"><?php esc_html_e( 'Pobyt w Salon Win', 'salon-win' ); ?></span>
                <h2 id="experience-heading" class="display-md" style="margin-top: 0.5rem;">
                    <?php esc_html_e( 'Powody, żeby przyjechać na kilka dni', 'salon-win' ); ?>
                </h2>
            </div>
            <p class="section-lead fade-up delay-1">
                <?php esc_html_e( 'Zamiast pojedynczej kolacji budujemy pełny pobyt: nocleg, wino, lokalną kuchnię, sztukę, historię regionu i krótkie wyjazdy po Podkarpaciu.', 'salon-win' ); ?>
            </p>
        </div>

        <div class="experience-grid">
            <?php
            $experiences = [
                [
                    'icon'  => 'fa-wine-glass-alt',
                    'label' => __( 'Degustacje', 'salon-win' ),
                    'title' => __( 'Wieczory z sommelierem', 'salon-win' ),
                    'text'  => __( 'Degustacje tematyczne, pairing do kolacji, warsztaty dla początkujących i prywatne spotkania przy winie.', 'salon-win' ),
                ],
                [
                    'icon'  => 'fa-champagne-glasses',
                    'label' => __( 'Wesela', 'salon-win' ),
                    'title' => __( 'Kameralne uroczystości', 'salon-win' ),
                    'text'  => __( 'Wino, menu, noclegi i opieka nad gośćmi w miejscu, które ma charakter butikowego domu gościnnego.', 'salon-win' ),
                ],
                [
                    'icon'  => 'fa-route',
                    'label' => __( 'Heritage trips', 'salon-win' ),
                    'title' => __( 'Wyprawy po dziedzictwie', 'salon-win' ),
                    'text'  => __( 'Trasy do winnic, Krosna, Karpackiej Troi, Biecza i miejsc, które opowiadają historię pogranicza.', 'salon-win' ),
                ],
                [
                    'icon'  => 'fa-palette',
                    'label' => __( 'Sztuka', 'salon-win' ),
                    'title' => __( 'Kolacje, wystawy i spotkania', 'salon-win' ),
                    'text'  => __( 'Wieczory z lokalnymi twórcami, małe ekspozycje, muzyka i rozmowy, które nadają pobytowi rytm.', 'salon-win' ),
                ],
            ];

            foreach ( $experiences as $index => $item ) :
            ?>
            <article class="experience-card fade-up" style="transition-delay: <?php echo esc_attr( $index * 0.08 ); ?>s;">
                <span class="experience-icon"><i class="fas <?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i></span>
                <span class="event-type"><?php echo esc_html( $item['label'] ); ?></span>
                <h3><?php echo esc_html( $item['title'] ); ?></h3>
                <p><?php echo esc_html( $item['text'] ); ?></p>
                <a href="#rezerwacja" class="experience-link">
                    <?php esc_html_e( 'Zapytaj o termin', 'salon-win' ); ?>
                    <i class="fas fa-arrow-right" aria-hidden="true"></i>
                </a>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<!-- ============================================================
   WYDARZENIA / EVENTY
============================================================ -->
<section class="events-section section" id="degustacje" aria-labelledby="events-heading">
    <div class="container">

        <div class="section-header flex-between" style="flex-wrap: wrap; gap: var(--space-md); margin-bottom: var(--space-lg);">
            <div class="fade-up">
                <span class="eyebrow"><?php esc_html_e( 'Nadchodzące wydarzenia', 'salon-win' ); ?></span>
                <h2 id="events-heading" class="display-md" style="margin-top: 0.5rem;">
                    <?php esc_html_e( 'Eventy, wesela, wyprawy i degustacje', 'salon-win' ); ?>
                </h2>
                <p class="section-lead">
                    <?php esc_html_e( 'Kalendarz może działać jako lista degustacji, spotkań artystycznych, konsultacji weselnych i wyjazdów po okolicy. Każde wydarzenie można połączyć z formularzem rezerwacji.', 'salon-win' ); ?>
                </p>
            </div>
            <a href="<?php echo esc_url( home_url( '/degustacje' ) ); ?>" class="btn btn-ghost fade-up delay-1">
                <span><?php esc_html_e( 'Wszystkie wydarzenia', 'salon-win' ); ?></span>
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </a>
        </div>

        <?php
        $events = salon_win_get_events( 5 );
        if ( $events ) :
        ?>
        <div class="events-list">
            <?php foreach ( $events as $index => $event ) :
                $date    = get_post_meta( $event->ID, 'sw_date',        true );
                $time    = get_post_meta( $event->ID, 'sw_time',        true );
                $price   = get_post_meta( $event->ID, 'sw_price',       true );
                $spots   = get_post_meta( $event->ID, 'sw_spots_left',  true );
                $type    = get_post_meta( $event->ID, 'sw_type',        true );
                $btn_url     = get_post_meta( $event->ID, 'sw_booking_url', true );
                $btn_url     = $btn_url ?: '#rezerwacja';
                $btn_external = str_starts_with( $btn_url, 'http' );
                $location= get_post_meta( $event->ID, 'sw_location',    true );
                $ts      = $date ? strtotime( $date ) : false;
            ?>
            <article class="event-card fade-up" style="transition-delay: <?php echo esc_attr( $index * 0.08 ); ?>s;">

                <div class="event-date">
                    <span class="date-day"><?php echo $ts ? esc_html( date_i18n( 'j', $ts ) ) : '—'; ?></span>
                    <span class="date-month"><?php echo $ts ? esc_html( date_i18n( 'M', $ts ) ) : ''; ?></span>
                </div>

                <div class="event-info">
                    <?php if ( $type ) : ?>
                        <span class="event-type"><?php echo esc_html( $type ); ?></span>
                    <?php endif; ?>
                    <h3 class="event-title"><?php echo esc_html( $event->post_title ); ?></h3>
                    <p class="event-details">
                        <?php if ( $time ) echo esc_html( $time ) . ' &mdash; '; ?>
                        <?php if ( $location ) echo esc_html( $location ); else echo esc_html( $city ); ?>
                        <?php if ( $spots ) echo ' &mdash; ' . sprintf( esc_html__( 'Pozostało: %d miejsc', 'salon-win' ), intval( $spots ) ); ?>
                    </p>
                </div>

                <div class="event-cta">
                    <?php if ( $price ) : ?>
                        <span class="event-price"><?php echo esc_html( salon_win_price( $price ) ); ?></span>
                    <?php endif; ?>
                    <span class="event-spots">
                        <?php echo $spots ? sprintf( esc_html__( '%d miejsc', 'salon-win' ), intval( $spots ) ) : esc_html__( 'Zapytaj o dostępność', 'salon-win' ); ?>
                    </span>
                    <a href="<?php echo esc_url( $btn_url ); ?>"
                       class="btn btn-primary"
                       <?php if ( $btn_external ) echo 'target="_blank" rel="noopener noreferrer"'; ?>>
                        <span><?php esc_html_e( 'Rezerwuj', 'salon-win' ); ?></span>
                    </a>
                </div>

            </article>
            <?php endforeach; ?>
        </div>

        <?php else : ?>
        <!-- No events placeholder -->
        <div class="events-list">
            <?php
            $sample_events = [
                [ 'day' => '18', 'month' => 'Lip', 'type' => __( 'Degustacja', 'salon-win' ),   'title' => __( 'Jasło i Podkarpacki Szlak Winnic — kolacja z pairingiem', 'salon-win' ), 'time' => '19:00', 'price' => '320', 'spots' => 12 ],
                [ 'day' => '25', 'month' => 'Lip', 'type' => __( 'Sztuka', 'salon-win' ),       'title' => __( 'Kolacja artystyczna: lokalni twórcy, muzyka i wino', 'salon-win' ), 'time' => '20:00', 'price' => '360', 'spots' => 18 ],
                [ 'day' => '01', 'month' => 'Sie', 'type' => __( 'Heritage trip', 'salon-win' ),'title' => __( 'Karpacka Troja, Krosno Miasto Szkła i wieczór w Salon Win', 'salon-win' ), 'time' => '10:00', 'price' => '540', 'spots' => 10 ],
                [ 'day' => '08', 'month' => 'Sie', 'type' => __( 'Wesela', 'salon-win' ),       'title' => __( 'Dzień konsultacji: menu, wino, sala i noclegi dla gości', 'salon-win' ), 'time' => '12:00', 'price' => '0', 'spots' => 6 ],
                [ 'day' => '15', 'month' => 'Sie', 'type' => __( 'Weekend', 'salon-win' ),      'title' => __( 'Beskid Niski slow: natura, wino i spokojny nocleg', 'salon-win' ), 'time' => '15:00', 'price' => '620', 'spots' => 8 ],
            ];
            foreach ( $sample_events as $ev ) :
            ?>
            <div class="event-card fade-up">
                <div class="event-date">
                    <span class="date-day"><?php echo esc_html( $ev['day'] ); ?></span>
                    <span class="date-month"><?php echo esc_html( $ev['month'] ); ?></span>
                </div>
                <div class="event-info">
                    <span class="event-type"><?php echo esc_html( $ev['type'] ); ?></span>
                    <h3 class="event-title"><?php echo esc_html( $ev['title'] ); ?></h3>
                    <p class="event-details"><?php echo esc_html( $ev['time'] ) . ' &mdash; ' . esc_html( $city ); ?></p>
                </div>
                <div class="event-cta">
                    <span class="event-price">
                        <?php echo $ev['price'] > 0 ? esc_html( salon_win_price( $ev['price'] ) ) : esc_html__( 'Bezpłatnie', 'salon-win' ); ?>
                    </span>
                    <span class="event-spots"><?php echo sprintf( esc_html__( '%d miejsc', 'salon-win' ), $ev['spots'] ); ?></span>
                    <a href="#rezerwacja" class="btn btn-primary">
                        <span><?php esc_html_e( 'Rezerwuj', 'salon-win' ); ?></span>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>

    </div>
</section>


<!-- ============================================================
   ATRAKCJE OKOLICY
============================================================ -->
<section class="attractions-section section" id="okolica" aria-labelledby="attractions-heading">
    <div class="container">
        <div class="attractions-layout">
            <div class="attractions-intro fade-left">
                <span class="eyebrow"><?php esc_html_e( 'Okolica i heritage trips', 'salon-win' ); ?></span>
                <h2 id="attractions-heading" class="display-md" style="margin-top: 0.5rem;">
                    <?php esc_html_e( 'Zaproś gości na weekend, nie tylko na kolację', 'salon-win' ); ?>
                </h2>
                <p>
                    <?php esc_html_e( 'Jasło jest dobrą bazą dla gości, którzy chcą połączyć wino, historię, naturę i rzemiosło. Salon Win może stać się miejscem startu, kolacji i odpoczynku po krótkich wyjazdach po regionie.', 'salon-win' ); ?>
                </p>

                <div class="itinerary-panel" aria-label="<?php esc_attr_e( 'Przykładowy plan pobytu', 'salon-win' ); ?>">
                    <?php
                    $itinerary = [
                        [ 'day' => __( 'Dzień 1', 'salon-win' ), 'text' => __( 'Przyjazd, meldunek, kolacja sezonowa i degustacja win dobranych przez sommeliera.', 'salon-win' ) ],
                        [ 'day' => __( 'Dzień 2', 'salon-win' ), 'text' => __( 'Heritage trip: winnice, Karpacka Troja, Krosno Miasto Szkła albo Biecz.', 'salon-win' ) ],
                        [ 'day' => __( 'Dzień 3', 'salon-win' ), 'text' => __( 'Spokojne śniadanie, Beskid Niski, zakup pamiątkowej butelki i powrót.', 'salon-win' ) ],
                    ];
                    foreach ( $itinerary as $step ) :
                    ?>
                    <div class="itinerary-step">
                        <strong><?php echo esc_html( $step['day'] ); ?></strong>
                        <span><?php echo esc_html( $step['text'] ); ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>

                <a href="#rezerwacja" class="btn btn-gold">
                    <span><?php esc_html_e( 'Ułóżmy plan pobytu', 'salon-win' ); ?></span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            <div class="attractions-grid">
                <?php
                $attractions = [
                    [
                        'icon'  => 'fa-wine-bottle',
                        'title' => __( 'Winnice i enoturystyka', 'salon-win' ),
                        'text'  => __( 'Degustacje lokalnych win, spotkania z producentami i opowieść o podkarpackim odrodzeniu winiarstwa.', 'salon-win' ),
                    ],
                    [
                        'icon'  => 'fa-landmark',
                        'title' => __( 'Karpacka Troja', 'salon-win' ),
                        'text'  => __( 'Archeologiczne dziedzictwo w Trzcinicy jako mocny punkt rodzinnego lub historycznego weekendu.', 'salon-win' ),
                    ],
                    [
                        'icon'  => 'fa-fire-flame-curved',
                        'title' => __( 'Krosno Miasto Szkła', 'salon-win' ),
                        'text'  => __( 'Pokazy hutnicze, rzemiosło, wystawy i szklane pamiątki jako naturalny kierunek dla miłośników sztuki użytkowej.', 'salon-win' ),
                    ],
                    [
                        'icon'  => 'fa-chess-rook',
                        'title' => __( 'Biecz i dawne miasta pogranicza', 'salon-win' ),
                        'text'  => __( 'Spacer przez historię małych miast, wież, rynków i opowieści o handlu, rzemiośle i kulturze regionu.', 'salon-win' ),
                    ],
                    [
                        'icon'  => 'fa-mountain-sun',
                        'title' => __( 'Beskid Niski i Magura', 'salon-win' ),
                        'text'  => __( 'Natura, cisza, krótkie trasy i odpoczynek po intensywnym wieczorze przy stole.', 'salon-win' ),
                    ],
                    [
                        'icon'  => 'fa-palette',
                        'title' => __( 'Sztuka i lokalni twórcy', 'salon-win' ),
                        'text'  => __( 'Wernisaże, warsztaty, kameralna muzyka i spotkania, które mogą wypełnić wieczór po degustacji.', 'salon-win' ),
                    ],
                ];

                foreach ( $attractions as $index => $item ) :
                ?>
                <article class="attraction-card fade-up" style="transition-delay: <?php echo esc_attr( $index * 0.06 ); ?>s;">
                    <i class="fas <?php echo esc_attr( $item['icon'] ); ?>" aria-hidden="true"></i>
                    <h3><?php echo esc_html( $item['title'] ); ?></h3>
                    <p><?php echo esc_html( $item['text'] ); ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>


<!-- ============================================================
   OPINIE GOŚCI
============================================================ -->
<section class="reviews-section section" id="opinie" aria-labelledby="reviews-heading">
    <div class="container">

        <div class="flex-between" style="flex-wrap: wrap; gap: var(--space-md); margin-bottom: var(--space-lg);">
            <div class="fade-up">
                <span class="eyebrow"><?php esc_html_e( 'Opinie gości', 'salon-win' ); ?></span>
                <h2 id="reviews-heading" class="display-md" style="color: var(--color-cream); margin-top: 0.5rem;">
                    <?php esc_html_e( 'Co mówią nasi goście', 'salon-win' ); ?>
                </h2>
                <p class="section-lead">
                    <?php esc_html_e( 'Ocena 4.9/5 na podstawie ponad 800 opinii w Google i TripAdvisor.', 'salon-win' ); ?>
                </p>
            </div>
        </div>

        <div class="reviews-track-wrap">
            <div class="reviews-track" id="reviews-track">

                <?php
                $reviews = salon_win_get_reviews( 12 );
                if ( $reviews ) :
                    foreach ( $reviews as $review ) :
                        $rating   = get_post_meta( $review->ID, 'sw_review_rating',    true ) ?: 5;
                        $name     = get_post_meta( $review->ID, 'sw_reviewer_name',    true ) ?: get_the_title( $review->ID );
                        $source   = get_post_meta( $review->ID, 'sw_reviewer_source',  true ) ?: 'Google';
                        $verified = get_post_meta( $review->ID, 'sw_review_verified',  true );
                ?>
                <div class="review-card">
                    <?php echo salon_win_stars( $rating ); ?>
                    <blockquote class="review-quote">
                        <?php echo wp_kses_post( get_the_excerpt( $review ) ?: $review->post_content ); ?>
                    </blockquote>
                    <div class="review-author">
                        <?php if ( has_post_thumbnail( $review->ID ) ) :
                            echo get_the_post_thumbnail( $review->ID, 'sw-thumb', [ 'class' => 'reviewer-avatar', 'loading' => 'lazy' ] );
                        else : ?>
                            <div class="reviewer-avatar" style="background: rgba(201,168,76,0.1); display:flex; align-items:center; justify-content:center; font-family:var(--font-display); color:var(--color-gold); font-size:1.1rem;">
                                <?php echo esc_html( mb_substr( $name, 0, 1 ) ); ?>
                            </div>
                        <?php endif; ?>
                        <div>
                            <span class="reviewer-name"><?php echo esc_html( $name ); ?></span>
                            <span class="reviewer-meta">
                                <?php echo esc_html( $source ); ?>
                                <?php if ( $verified ) echo ' &mdash; ' . __( 'Zweryfikowana wizyta', 'salon-win' ); ?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                else :
                    // Placeholder reviews
                    $sample_reviews = [
                        [ 'rating' => 5, 'name' => 'Marta W.', 'source' => 'Google', 'quote' => __( 'Absolutnie wyjątkowe miejsce. Degustacja z Piotrem była prawdziwą podróżą przez regiony winiarskie Francji. Powrócimy bez wahania.', 'salon-win' ) ],
                        [ 'rating' => 5, 'name' => 'Tomasz K.', 'source' => 'TripAdvisor', 'quote' => __( 'Organizowaliśmy wieczór firmowy dla 30 osób. Obsługa perfekcyjna, dobór win dopasowany do każdego podniebienia. Polecam każdemu.', 'salon-win' ) ],
                        [ 'rating' => 5, 'name' => 'Agnieszka L.', 'source' => 'Google', 'quote' => __( 'Piękne wnętrze, niesamowita atmosfera. Kupiłam butelkę Barolo jako prezent i wróciłam po więcej dla siebie. Sklep z wyjątkowym wyborem.', 'salon-win' ) ],
                        [ 'rating' => 5, 'name' => 'Marcin R.', 'source' => 'Google', 'quote' => __( 'Kurs degustacji dla dwojga to był najlepszy pomysł na romantyczną kolację. Polecam każdemu kto chce nauczyć się czegoś nowego w pięknym miejscu.', 'salon-win' ) ],
                        [ 'rating' => 5, 'name' => 'Karolina M.', 'source' => 'Booking.com', 'quote' => __( 'Rewelacyjna obsługa i niesamowita wiedza sommelierów. Poczułam się jak na wycieczce do Toskanii bez wyjeżdżania z Jasła.', 'salon-win' ) ],
                        [ 'rating' => 5, 'name' => 'Piotr S.', 'source' => 'Google', 'quote' => __( 'Stosunek jakości do ceny zaskakuje pozytywnie. Dostałem profesjonalne doradztwo i trafiłem na idealne wino do obiadu w dobrej cenie. Wróciłem już kilka razy.', 'salon-win' ) ],
                    ];
                    foreach ( $sample_reviews as $rev ) :
                ?>
                <div class="review-card">
                    <?php echo salon_win_stars( $rev['rating'] ); ?>
                    <blockquote class="review-quote"><?php echo esc_html( $rev['quote'] ); ?></blockquote>
                    <div class="review-author">
                        <div class="reviewer-avatar" style="background: rgba(201,168,76,0.1); display:flex; align-items:center; justify-content:center; font-family:var(--font-display); color:var(--color-gold); font-size:1.1rem; border-radius:50%; width:42px; height:42px;">
                            <?php echo esc_html( mb_substr( $rev['name'], 0, 1 ) ); ?>
                        </div>
                        <div>
                            <span class="reviewer-name"><?php echo esc_html( $rev['name'] ); ?></span>
                            <span class="reviewer-meta"><?php echo esc_html( $rev['source'] ); ?></span>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                endif;
                ?>

            </div><!-- .reviews-track -->
        </div>

        <div class="reviews-controls">
            <button class="review-nav" id="review-prev" aria-label="<?php esc_attr_e( 'Poprzednia opinia', 'salon-win' ); ?>">
                <i class="fas fa-arrow-left" aria-hidden="true"></i>
            </button>
            <button class="review-nav" id="review-next" aria-label="<?php esc_attr_e( 'Następna opinia', 'salon-win' ); ?>">
                <i class="fas fa-arrow-right" aria-hidden="true"></i>
            </button>
            <div class="review-platform">
                <span class="platform-rating">4.9</span>
                <span><?php esc_html_e( '/ 5 — Google Reviews', 'salon-win' ); ?></span>
            </div>
        </div>

    </div>
</section>


<!-- ============================================================
   GALERIA
============================================================ -->
<section class="gallery-section" id="galeria" aria-label="<?php esc_attr_e( 'Galeria Salon Win', 'salon-win' ); ?>">
    <div class="gallery-grid">
        <?php
        $gallery_items = [
            [ 'key' => 'sw_image_gallery_1', 'fallback' => 'gallery-1.jpg', 'alt' => __( 'Sala degustacyjna Salon Win',    'salon-win' ), 'span' => true  ],
            [ 'key' => 'sw_image_gallery_2', 'fallback' => 'gallery-2.jpg', 'alt' => __( 'Butelki win na ladzie barowej',  'salon-win' ), 'span' => false ],
            [ 'key' => 'sw_image_gallery_3', 'fallback' => 'gallery-3.jpg', 'alt' => __( 'Kieliszki wina przy degustacji','salon-win' ), 'span' => false ],
            [ 'key' => 'sw_image_gallery_4', 'fallback' => 'gallery-4.jpg', 'alt' => __( 'Piwnica winna Salon Win',        'salon-win' ), 'span' => false ],
            [ 'key' => 'sw_image_gallery_5', 'fallback' => 'gallery-5.jpg', 'alt' => __( 'Wnętrze baru winnego',           'salon-win' ), 'span' => false ],
        ];
        foreach ( $gallery_items as $g ) :
        ?>
        <div class="gallery-item<?php echo $g['span'] ? ' span-2' : ''; ?>">
            <img src="<?php echo esc_url( salon_win_get_image_url( $g['key'], $g['fallback'] ) ); ?>"
                 alt="<?php echo esc_attr( $g['alt'] ); ?>"
                 loading="lazy">
            <div class="gallery-overlay" aria-hidden="true"></div>
        </div>
        <?php endforeach; ?>
    </div>
</section>


<!-- ============================================================
   LOKALIZACJA
============================================================ -->
<section class="location-section section" id="kontakt" aria-labelledby="location-heading">
    <div class="container">

        <div class="location-grid">
            <div class="location-info fade-left">
                <span class="eyebrow"><?php esc_html_e( 'Znajdź nas', 'salon-win' ); ?></span>
                <h2 id="location-heading" class="display-md" style="margin-top: 0.5rem;">
                    <?php esc_html_e( 'Odwiedź salon', 'salon-win' ); ?>
                </h2>
                <p>
                    <?php esc_html_e( 'Zapraszamy do Salonu-Win w Jaśle. Parking dostępny w pobliżu.', 'salon-win' ); ?>
                </p>

                <div class="info-blocks">
                    <div class="info-block">
                        <span class="info-label"><?php esc_html_e( 'Adres', 'salon-win' ); ?></span>
                        <span class="info-value">
                            <?php echo esc_html( $address ); ?><br>
                            <?php echo esc_html( $postal_code . ' ' . $city ); ?>
                        </span>
                    </div>
                    <div class="info-block">
                        <span class="info-label"><?php esc_html_e( 'Restauracja Salon-Win', 'salon-win' ); ?></span>
                        <span class="info-value">
                            <?php foreach ( $restaurant_hours as $restaurant_day ) : ?>
                                <?php echo esc_html( $restaurant_day['day'] ); ?>:
                                <?php if ( 'tel.' === $restaurant_day['hours'] ) : ?>
                                    <a href="<?php echo esc_url( $phone_url ); ?>" style="color: var(--color-gold);"><?php esc_html_e( 'tel.', 'salon-win' ); ?></a>
                                <?php else : ?>
                                    <?php echo esc_html( $restaurant_day['hours'] ); ?>
                                <?php endif; ?>
                                <br>
                            <?php endforeach; ?>
                        </span>
                    </div>
                    <div class="info-block">
                        <span class="info-label"><?php esc_html_e( 'Hotel Salon-Win', 'salon-win' ); ?></span>
                        <span class="info-value">
                            <?php esc_html_e( 'Recepcja:', 'salon-win' ); ?>
                            <a href="<?php echo esc_url( $phone_url ); ?>" style="color: var(--color-gold);"><?php echo esc_html( $phone ); ?></a><br>
                            <?php esc_html_e( 'Doba hotelowa:', 'salon-win' ); ?> <?php echo esc_html( $hotel_day ); ?>
                        </span>
                    </div>
                    <div class="info-block">
                        <span class="info-label"><?php esc_html_e( 'Kontakt', 'salon-win' ); ?></span>
                        <span class="info-value">
                            <a href="<?php echo esc_url( $phone_url ); ?>" style="color: var(--color-gold);"><?php echo esc_html( $phone ); ?></a><br>
                            <a href="mailto:<?php echo esc_attr( $email_opt ); ?>" style="color: var(--color-gold);"><?php echo esc_html( $email_opt ); ?></a>
                        </span>
                    </div>
                </div>

                <div class="mt-lg" style="display: flex; gap: var(--space-sm); flex-wrap: wrap;">
                    <a href="#rezerwacja" class="btn btn-gold">
                        <span><?php esc_html_e( 'Wyślij zapytanie', 'salon-win' ); ?></span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="<?php echo esc_url( $booking_url ); ?>"
                       class="btn btn-outline"
                       <?php if ( $booking_is_external ) echo 'target="_blank" rel="noopener noreferrer"'; ?>>
                        <span><?php esc_html_e( 'Nocleg przez Booking.com', 'salon-win' ); ?></span>
                    </a>
                    <a href="<?php echo esc_url( $maps_url ); ?>" target="_blank" rel="noopener" class="btn btn-outline">
                        <span><?php esc_html_e( 'Otwórz w Mapach', 'salon-win' ); ?></span>
                    </a>
                </div>
            </div>

            <div class="map-wrap fade-up delay-1">
                <?php if ( $maps_embed ) : ?>
                    <iframe
                        src="<?php echo esc_url( $maps_embed ); ?>"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="<?php esc_attr_e( 'Mapa lokalizacji Salon Win', 'salon-win' ); ?>">
                    </iframe>
                <?php else : ?>
                    <iframe
                        src="<?php echo esc_url( $maps_fallback ); ?>"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="<?php esc_attr_e( 'Mapa — ul. Wyspiańskiego 16, 38-200 Jasło', 'salon-win' ); ?>">
                    </iframe>
                <?php endif; ?>
            </div>
        </div>

    </div>
</section>


<!-- ============================================================
   NEWSLETTER
============================================================ -->
<section class="newsletter-section" aria-labelledby="newsletter-heading">
    <div class="container">
        <div class="newsletter-inner">

            <div class="newsletter-copy fade-left">
                <h3 id="newsletter-heading"><?php esc_html_e( 'Bądź na bieżąco', 'salon-win' ); ?></h3>
                <p><?php esc_html_e( 'Nowe degustacje, ekskluzywne oferty i winne nowości. Bez spamu.', 'salon-win' ); ?></p>
            </div>

            <div class="newsletter-form fade-up delay-1">
                <form id="newsletter-form" novalidate>
                    <div class="newsletter-form-row">
                        <input type="email"
                               id="newsletter-email"
                               name="email"
                               placeholder="<?php esc_attr_e( 'Twój adres e-mail', 'salon-win' ); ?>"
                               required
                               autocomplete="email"
                               aria-label="<?php esc_attr_e( 'Adres e-mail', 'salon-win' ); ?>">
                        <button type="submit" class="btn-newsletter">
                            <?php esc_html_e( 'Zapisuję się', 'salon-win' ); ?>
                        </button>
                    </div>
                    <p class="newsletter-consent">
                        <?php esc_html_e( 'Zapisując się, wyrażasz zgodę na przetwarzanie danych w celach marketingowych. Możesz wypisać się w każdej chwili.', 'salon-win' ); ?>
                    </p>
                    <div id="newsletter-feedback" role="alert" aria-live="polite" style="display:none;" class="body-sm mt-sm"></div>
                </form>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>
