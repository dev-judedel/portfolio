#!/bin/bash

echo "================================================"
echo " Committing Black and White Aesthetic Updates"
echo "================================================"
echo ""

cd "C:/laragon/www/portfolio"

echo "Current branch:"
git branch --show-current
echo ""

echo "Checking status..."
git status
echo ""

echo "Adding all changes..."
git add .
echo ""

echo "Committing changes..."
git commit -m "feat: implement black and white aesthetic design

- Removed constellation particle effect
- Updated layout to dark charcoal background (#1a1a1a)
- Implemented glass-morphism card design
- Added gradient text effects for headings
- Created white gradient primary buttons with shimmer
- Updated secondary buttons with transparent borders
- Added subtle texture overlay and gradient backgrounds
- Maintained ultra-light typography with spacious design
- Enhanced hover effects with glow and elevation
- Added geometric visual elements to replace particles
- Updated all sections with B&W theme (Hero, Projects, Skills, Testimonials, CTA)
- Preserved original image colors as requested
- Improved accessibility with high contrast B&W palette"
echo ""

echo ""
echo "================================================"
echo "Changes have been committed to 'update_design' branch!"
echo "================================================"
echo ""
echo "To push to remote, run:"
echo "git push origin update_design"
echo ""
echo "Or if you want to set upstream and push:"
echo "git push -u origin update_design"
echo ""
