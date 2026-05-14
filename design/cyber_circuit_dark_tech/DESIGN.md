---
name: Cyber-Circuit Dark Tech
colors:
  surface: '#0e1322'
  surface-dim: '#0e1322'
  surface-bright: '#343949'
  surface-container-lowest: '#090e1c'
  surface-container-low: '#161b2b'
  surface-container: '#1a1f2f'
  surface-container-high: '#25293a'
  surface-container-highest: '#2f3445'
  on-surface: '#dee1f7'
  on-surface-variant: '#c4c6d3'
  inverse-surface: '#dee1f7'
  inverse-on-surface: '#2b3040'
  outline: '#8e909d'
  outline-variant: '#444651'
  surface-tint: '#b5c4ff'
  primary: '#b5c4ff'
  on-primary: '#00297a'
  primary-container: '#1b3a8a'
  on-primary-container: '#8ea8ff'
  inverse-primary: '#3f5aab'
  secondary: '#ffb689'
  on-secondary: '#512300'
  secondary-container: '#e1721a'
  on-secondary-container: '#471e00'
  tertiary: '#3cd7ff'
  on-tertiary: '#003642'
  tertiary-container: '#004656'
  on-tertiary-container: '#00bbe1'
  error: '#ffb4ab'
  on-error: '#690005'
  error-container: '#93000a'
  on-error-container: '#ffdad6'
  primary-fixed: '#dbe1ff'
  primary-fixed-dim: '#b5c4ff'
  on-primary-fixed: '#00174d'
  on-primary-fixed-variant: '#244191'
  secondary-fixed: '#ffdbc8'
  secondary-fixed-dim: '#ffb689'
  on-secondary-fixed: '#311300'
  on-secondary-fixed-variant: '#743500'
  tertiary-fixed: '#b4ebff'
  tertiary-fixed-dim: '#3cd7ff'
  on-tertiary-fixed: '#001f27'
  on-tertiary-fixed-variant: '#004e5f'
  background: '#0e1322'
  on-background: '#dee1f7'
  surface-variant: '#2f3445'
typography:
  headline-xl:
    fontFamily: Inter
    fontSize: 48px
    fontWeight: '800'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Inter
    fontSize: 24px
    fontWeight: '700'
    lineHeight: '1.3'
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-sm:
    fontFamily: JetBrains Mono
    fontSize: 12px
    fontWeight: '500'
    lineHeight: '1.0'
    letterSpacing: 0.1em
  headline-xl-mobile:
    fontFamily: Inter
    fontSize: 32px
    fontWeight: '800'
    lineHeight: '1.2'
spacing:
  base: 8px
  gutter: 24px
  margin-mobile: 16px
  margin-desktop: 80px
  container-max: 1280px
---

## Brand & Style

Le système de design pour OXMOSYS-TECH incarne une esthétique "Dark-Tech" sophistiquée, ancrée dans la précision technique et l'innovation numérique. Inspiré par les structures de micro-processeurs et le dynamisme de Djibouti en tant que hub technologique, le style visuel privilégie une structure rigoureuse et une clarté absolue.

L'orientation esthétique est un mélange de **Minimalisme High-Contrast** et de **Digital Brutalism**. La hiérarchie est dictée par une grille géométrique stricte, reflétant le logo en 2x2. L'atmosphère est nocturne et immersive, utilisant des motifs de circuits abstraits et des bordures nettes pour évoquer la fiabilité d'une infrastructure IT de classe mondiale. L'expérience utilisateur doit se ressentir comme un terminal de commande moderne : rapide, précis et puissant.

## Colors

La palette chromatique est construite sur un contraste fort entre l'obscurité profonde et l'énergie cinétique.

- **Primary Navy (#1B3A8A):** Utilisé pour l'identité structurelle, les bordures de cartes et les états actifs subtils. Il représente la stabilité et l'expertise IT.
- **Accent Orange (#E87820):** Réservé exclusivement aux appels à l'action (CTA), aux indicateurs d'état critiques et aux accents au survol. Sa chaleur tranche radicalement avec le fond froid.
- **Deep Dark Background (#0A0F1E):** La base canvas du site, offrant un contraste infini pour le texte blanc.
- **Secondary Background (#111827):** Utilisé pour différencier les sections ou les surfaces de cartes, créant une profondeur par couches de tons plutôt que par des ombres.
- **Text:** Le blanc pur est utilisé pour les titres, tandis que le corps de texte est maintenu à 70% d'opacité pour réduire la fatigue visuelle et établir une hiérarchie claire.

## Typography

Le système utilise **Inter** comme police principale pour sa clarté chirurgicale et son aspect technique. Pour renforcer l'aspect "code" et infrastructure, la police monospacée **JetBrains Mono** est introduite pour les micro-données et les labels.

Les titres sont imposants et denses (Bold/Extra-Bold), agissant comme des ancres visuelles dans la mise en page. Le corps de texte privilégie la lisibilité avec une hauteur de ligne généreuse (1.6) et une opacité réduite à 70% pour créer un équilibre harmonieux sur le fond sombre. Tous les titres de sections doivent être en majuscules avec un léger espacement de lettres pour évoquer la précision technique.

## Layout & Spacing

Le layout repose sur une **Grille Fixe de 12 colonnes** sur desktop, inspirée par la géométrie 2x2 du logo. Les alignements sont stricts et mathématiques.

- **Rythme 8px:** Toutes les dimensions, marges et paddings sont des multiples de 8px pour assurer une cohérence totale.
- **Grille de Circuit:** Des motifs de grille de 1px (Navy à 10% d'opacité) peuvent être utilisés en arrière-plan pour renforcer l'aspect technologique.
- **Adaptation:** Sur mobile, la grille passe à 2 colonnes avec des marges réduites, transformant les cartes horizontales en blocs verticaux empilés. L'espacement entre les sections est généreux pour laisser "respirer" les composants cybernétiques.

## Elevation & Depth

Ce design système rejette les ombres portées traditionnelles au profit de la **Superposition de Couches Tonales** et de bordures lumineuses.

- **Hiérarchie par la couleur de fond:** Plus un élément est important ou "élevé" dans l'interface, plus sa couleur de fond se rapproche du Navy ou devient légèrement plus claire que le fond principal.
- **Bordures de 1px:** Les cartes et les conteneurs utilisent des bordures de 1px couleur Navy (#1B3A8A).
- **Accents de Survol:** L'élévation est communiquée lors de l'interaction par le changement de couleur de la bordure (du Navy vers l'Orange) et l'ajout d'une lueur interne (inner glow) orange très subtile.
- **Absence de flou:** Pas de Glassmorphism ici ; les surfaces sont opaques et solides pour refléter la rigueur industrielle.

## Shapes

La forme dominante est le **Rectangle Parfait**. Conformément à l'esthétique des circuits imprimés et du logo quadrillé, les coins sont maintenus à 0px de rayon pour la majorité des éléments structurels (cartes, sections, images).

Une exception unique est faite pour les **boutons**, qui utilisent un arrondi de 6px pour signaler leur caractère interactif et "cliquable", les différenciant ainsi des éléments d'information statiques. Les icônes doivent suivre cette logique : des traits fins, géométriques, sans remplissage excessif.

## Components

- **Buttons:** Fond Orange (#E87820) avec texte blanc pour les actions primaires. Bordure Navy avec fond transparent pour les actions secondaires. Toujours arrondis à 6px.
- **Cards:** Coins vifs (sharp), bordure 1px Navy. Au survol, la bordure devient Orange et un indicateur visuel (petit carré orange) apparaît dans le coin supérieur droit.
- **Inputs:** Fond Secondary Background, bordure Navy 1px, texte blanc à 90%. Focus state : bordure Orange.
- **Chips/Badges:** Style JetBrains Mono, fond Navy sombre, bordure Navy claire, texte blanc 80%.
- **Abstract Patterns:** À la place des photos, utiliser des dégradés de lignes, des nuages de points (dot matrix) ou des représentations stylisées de flux de données en Navy et Cyan.
- **Icons:** Utiliser exclusivement la famille *Phosphor* en style 'Regular' ou 'Light' pour maintenir la finesse technique.