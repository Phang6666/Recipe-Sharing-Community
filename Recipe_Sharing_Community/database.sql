-- Create the restaurant database
CREATE DATABASE IF NOT EXISTS mummumrecipe CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Use the restaurant database
USE mummumrecipe;

-- Create the orders table
CREATE TABLE IF NOT EXISTS contact (
	id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(100),
	email VARCHAR(100),
	phone VARCHAR(20),
	enquiry VARCHAR(20),
	subject TEXT,
	posted_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create the recipes table
CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    photo VARCHAR(255),
    ingredients TEXT,
    directions TEXT,
    servings INT NOT NULL,
    prep_time_value INT NOT NULL,
    prep_time_unit VARCHAR(50) NOT NULL,
    cook_time_value INT,
    cook_time_unit VARCHAR(50),
    total_time VARCHAR(50) NOT NULL,
    notes TEXT
);

CREATE TABLE IF NOT EXISTS wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user (
    id INT(11) NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY email (email)
);


INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Fried Kuey Teow',
    'A popular Malaysian stir-fried noodle dish.',
    'kueytiau',
    'Flat rice noodles, prawns, Chinese sausage, bean sprouts, eggs, chives, soy sauce, chili paste',
    'Soak the flat rice noodles in water until softened, then drain.
     Heat oil in a wok and stir-fry prawns, Chinese sausage, and bean sprouts until cooked.
     Push ingredients to the side of the wok and scramble eggs on the empty side.
     Add flat rice noodles, soy sauce, and chili paste to the wok. Stir-fry until everything is well combined.
     Add chives and continue to stir-fry for another minute.
     Serve hot.',
    '4',
    '15',
    'minutes',
    '10',
    'minutes',
    '25 minutes',
    'You can adjust the spiciness by adding more or less chili paste according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Nasi Lemak',
    'A traditional Malaysian dish consisting of fragrant rice cooked in coconut milk, served with various accompaniments.',
    'nasilemak',
    'Rice, coconut milk, pandan leaves, dried anchovies, peanuts, cucumber slices, boiled egg, sambal (spicy chili paste)',
    'Rinse rice and drain well. Cook rice with coconut milk, pandan leaves, and salt until fluffy.
     Fry dried anchovies and peanuts until crispy.
     Serve rice with fried anchovies, peanuts, cucumber slices, boiled egg, and sambal.',
    '4',
    '15',
    'minutes',
    '30',
    'minutes',
    '45 minutes',
    'You can adjust the spiciness of the sambal according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Wantan Mee Soup',
    'A delicious Chinese noodle soup dish with wantan dumplings.',
    'wantanmee',
    'Egg noodles, wantan dumplings, bok choy, spring onions, garlic, ginger, soy sauce, sesame oil, chicken broth',
    'Cook egg noodles according to package instructions. Drain and set aside.
     In a pot, bring chicken broth to a boil. Add garlic and ginger.
     Add wantan dumplings and cook until they float to the surface.
     Add bok choy and cook until tender.
     Season with soy sauce and sesame oil.
     Serve hot with cooked egg noodles and garnish with spring onions.',
    '4',
    '10',
    'minutes',
    '20',
    'minutes',
    '30 minutes',
    'Feel free to add other vegetables or protein of your choice to customize the soup.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Curry Laksa',
    'A popular Malaysian noodle soup with a rich and spicy coconut curry broth.',
    'currylaksa',
    'Rice vermicelli noodles, chicken thighs, shrimp, tofu puffs, bean sprouts, laksa paste, coconut milk, fish sauce, hard-boiled eggs, fresh lime, cilantro',
    'Cook rice vermicelli noodles according to package instructions. Drain and set aside.
     In a pot, heat laksa paste until fragrant. Add coconut milk and chicken broth. Bring to a simmer.
     Add chicken thighs and shrimp. Cook until chicken is cooked through and shrimp are pink.
     Add tofu puffs and bean sprouts. Cook for a few more minutes.
     Season with fish sauce.
     Serve hot with cooked rice vermicelli noodles, halved hard-boiled eggs, fresh lime wedges, and garnish with cilantro.',
    '4',
    '15',
    'minutes',
    '25',
    'minutes',
    '40 minutes',
    'You can adjust the spiciness by adding more or less laksa paste according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Mee Goreng',
    'A popular Malaysian fried noodle dish with a spicy and tangy sauce.',
    'meegoreng',
    'Yellow noodles, shrimp, tofu, eggs, tomatoes, shallots, garlic, chili, soy sauce, kecap manis, lime juice',
    'Boil yellow noodles until al dente. Drain and set aside.
     Heat oil in a wok. Stir-fry shallots, garlic, and chili until fragrant.
     Add shrimp and tofu. Cook until shrimp turn pink and tofu is golden.
     Push ingredients to the side of the wok and scramble eggs on the empty side.
     Add tomatoes and cooked yellow noodles to the wok. Stir-fry until well combined.
     Season with soy sauce, kecap manis, and lime juice.
     Serve hot.',
    '4',
    '10',
    'minutes',
    '20',
    'minutes',
    '30 minutes',
    'Feel free to add other vegetables or protein of your choice to customize the dish.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Nasi Kerabu',
    'A traditional Malay dish of blue-colored rice served with various herbs and condiments.',
    'nasikerabu',
    'Jasmine rice, butterfly pea flowers, turmeric, lemongrass, kaffir lime leaves, cucumber, long beans, bean sprouts, fried coconut, salted egg, kerisik (toasted grated coconut), fish crackers, sambal belacan',
    'Cook jasmine rice with butterfly pea flowers, turmeric, lemongrass, and kaffir lime leaves until done.
     Prepare the herbs and condiments: Slice cucumber and long beans, rinse bean sprouts, crush fish crackers.
     Assemble the dish: Place blue-colored rice on a plate, arrange cucumber, long beans, bean sprouts, fried coconut, and sliced salted egg on top. Sprinkle with kerisik and fish crackers. Serve with sambal belacan on the side.',
    '4',
    '20',
    'minutes',
    '30',
    'minutes',
    '50 minutes',
    'Feel free to adjust the amount of sambal belacan according to your preferred level of spiciness.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Ayam Percik',
    'A traditional Malay grilled chicken dish with a flavorful spicy coconut marinade.',
    'ayampercik',
    'Chicken thighs, coconut milk, lemongrass, shallots, garlic, ginger, galangal, turmeric, dried chili, tamarind paste, sugar, salt',
    'Blend lemongrass, shallots, garlic, ginger, galangal, turmeric, dried chili, tamarind paste, sugar, and salt to make a spice paste.
     Marinate chicken thighs in the spice paste and coconut milk for at least 4 hours or overnight.
     Grill chicken over medium heat until cooked through, basting with the marinade occasionally.
     Serve hot with rice or as desired.',
    '4',
    '20',
    'minutes',
    '30',
    'minutes',
    '50 minutes',
    'You can adjust the spiciness by adding more or less dried chili according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Roti John',
    'A popular Malaysian street food consisting of an omelette sandwich with minced meat filling.',
    'rotijohn',
    'French loaf, minced meat (chicken or beef), onion, garlic, eggs, chili sauce, mayonnaise, cucumber, lettuce, tomato slices',
    'Heat a pan and add some oil. Sauté minced meat with chopped onions and garlic until cooked.
     Beat eggs and pour over the cooked minced meat mixture to form an omelette.
     Place French loaf halves on top of the omelette and press down gently.
     Flip the omelette with the bread and cook until the bread is crispy and golden brown.
     Spread chili sauce and mayonnaise on the inner side of the bread.
     Add cucumber slices, lettuce, tomato slices, and any additional toppings as desired.
     Fold the omelette over the fillings to form a sandwich.
     Slice and serve hot.',
    '4',
    '15',
    'minutes',
    '20',
    'minutes',
    '35 minutes',
    'Feel free to customize the fillings and adjust the spiciness of the chili sauce according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Nasi Kandar',
    'A popular Malaysian dish originating from Penang, featuring steamed rice served with a variety of flavorful curries and side dishes.',
    'nasikandar',
    'Steamed rice, chicken curry, beef curry, fish curry, prawn curry, fried chicken, fried fish, fried squid, fried egg, okra, brinjal (eggplant), acar (pickled vegetables), sambal',
    'Prepare steamed rice and keep warm.
     Serve a variety of curries and side dishes such as chicken curry, beef curry, fish curry, prawn curry, fried chicken, fried fish, fried squid, fried egg, okra, brinjal, acar, and sambal on individual plates or bowls.
     Allow diners to choose their desired combination of curries and side dishes to accompany their steamed rice.
     Enjoy the flavorful and diverse flavors of Nasi Kandar!',
    '4',
    '20',
    'minutes',
    '30',
    'minutes',
    '50 minutes',
    'Nasi Kandar is known for its rich and aromatic curries, and its often enjoyed as a hearty meal for lunch or dinner.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Satay',
    'A popular Southeast Asian dish consisting of skewered and grilled meat served with a flavorful peanut sauce.',
    'satay',
    'Chicken, beef, or lamb meat (cut into cubes), shallots, garlic, lemongrass, ginger, turmeric, coriander powder, cumin powder, coconut milk, soy sauce, brown sugar, skewers',
    'Prepare the marinade: Blend shallots, garlic, lemongrass, ginger, turmeric, coriander powder, cumin powder, coconut milk, soy sauce, and brown sugar until smooth.
     Marinate the meat in the prepared marinade for at least 4 hours or overnight.
     Thread the marinated meat onto skewers.
     Grill the skewered meat over medium-high heat until cooked through and slightly charred, turning occasionally.
     Serve hot with peanut sauce and optional accompaniments like cucumber slices and rice cakes (ketupat).
     Enjoy the delicious and aromatic satay!',
    '4',
    '30',
    'minutes',
    '15',
    'minutes',
    '45 minutes',
    'Feel free to customize the marinade and adjust the level of spiciness according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Kaya Toast',
    'A classic Singaporean and Malaysian breakfast dish featuring toasted bread spread with kaya (coconut and pandan jam) and topped with butter.',
    'kayatoast',
    'Bread slices, kaya (coconut and pandan jam), butter',
    'Toast bread slices until golden brown and crispy.
     Spread a generous amount of kaya on one side of each toasted bread slice.
     Place a slice of butter on top of the kaya.
     Sandwich two slices of bread together with the kaya and butter sides facing each other.
     Optionally, cut the sandwich into halves or quarters for easier handling.
     Serve hot with a cup of hot coffee or tea.',
    '2',
    '5',
    'minutes',
    '5',
    'minutes',
    '10 minutes',
    'Kaya toast is commonly enjoyed as a breakfast dish or snack in Singapore and Malaysia. You can adjust the amount of kaya and butter according to your taste preferences.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Cendol',
    'A popular Southeast Asian dessert made with pandan-flavored rice flour jelly, coconut milk, palm sugar syrup, and shaved ice.',
    'cendol',
    'Rice flour, pandan leaves, coconut milk, palm sugar (gula melaka), shaved ice',
    'Prepare the cendol jelly: Blend rice flour and pandan leaves with water until smooth. Strain the mixture to remove any solids.
     Cook the strained mixture over low heat until it thickens into a jelly-like consistency. Transfer to a bowl of ice water and let it cool.
     Prepare the palm sugar syrup: Dissolve palm sugar in water over low heat until it forms a thick syrup. Let it cool.
     Assemble the cendol: In serving bowls or glasses, place a generous amount of cendol jelly. Pour coconut milk and palm sugar syrup over the jelly. Add shaved ice on top.
     Serve immediately and enjoy the refreshing and sweet flavors of cendol!',
    '4',
    '30',
    'minutes',
    '10',
    'minutes',
    '40 minutes',
    'Cendol is often enjoyed as a dessert or snack in Southeast Asia, especially during hot weather.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Pan Mee',
    'A popular Malaysian noodle dish served with a flavorful broth.',
    'panmee',
    'Handmade noodles, minced pork, shiitake mushrooms, anchovies, fried shallots, bok choy, garlic, soy sauce, sesame oil, chili flakes',
    'Prepare the broth by simmering anchovies, garlic, and shiitake mushrooms in water for about 30 minutes. Strain the broth and set aside.
     Cook the handmade noodles according to package instructions. Drain and set aside.
     In a pan, heat some oil and fry the minced pork until cooked through. Add soy sauce and sesame oil for flavor.
     Divide cooked noodles into serving bowls. Top with minced pork, bok choy, and fried shallots.
     Pour the hot broth over the noodles and garnish with chili flakes.
     Serve hot.',
    '4',
    '20',
    'minutes',
    '30',
    'minutes',
    '50 minutes',
    'You can customize the toppings and adjust the spiciness according to your preference.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Hakka Lei Cha',
    'A traditional Hakka dish consisting of a fragrant tea-based soup served over rice.',
    'leicha',
    'For the soup: basil leaves, mint leaves, cilantro leaves, green tea leaves, sesame seeds, peanuts, garlic, ginger, dried shrimp, green chili peppers, soy sauce, salt, water; For the rice: jasmine rice; Optional toppings: tofu, long beans, mushrooms, bok choy, pickled radish',
    'Prepare the soup by grinding together basil leaves, mint leaves, cilantro leaves, green tea leaves, sesame seeds, peanuts, garlic, ginger, dried shrimp, and green chili peppers with a mortar and pestle or a food processor until a paste-like consistency is achieved. Transfer the mixture to a pot, add water, soy sauce, and salt, and bring to a boil. Simmer for about 15-20 minutes.
     Meanwhile, cook the jasmine rice according to package instructions.
     Once the soup is ready, strain it to remove any solid bits, leaving only the flavorful broth.
     To serve, divide the cooked jasmine rice into serving bowls. Ladle the hot soup over the rice.
     Optionally, top with tofu, long beans, mushrooms, bok choy, or pickled radish.
     Enjoy the Hakka Lei Cha Rice while hot!',
    '4-6',
    '30',
    'minutes',
    '20',
    'minutes',
    '50 minutes',
    'You can adjust the ingredients and toppings according to your taste preferences.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Roasted Chicken Rice',
    'A delicious and flavorful Asian dish featuring tender roasted chicken served with fragrant rice.',
    'chickenrice',
    'Chicken (whole or parts), jasmine rice, chicken broth, ginger, garlic, spring onions, soy sauce, oyster sauce, sesame oil, cucumber, chili sauce',
    'Preheat the oven to 200°C (400°F). Rub the chicken with a mixture of soy sauce, oyster sauce, minced ginger, minced garlic, and sesame oil. Place the chicken on a roasting rack and roast in the preheated oven for about 1 hour or until golden brown and cooked through.
     While the chicken is roasting, rinse the jasmine rice until the water runs clear. Cook the rice in chicken broth instead of water for added flavor, along with slices of ginger and spring onions.
     Once the chicken is cooked, let it rest for a few minutes before carving it into serving pieces.
     Serve the roasted chicken with fragrant jasmine rice, sliced cucumber, and chili sauce on the side.',
    '4-6',
    '20',
    'minutes',
    '1',
    'hour',
    '1 hour 20 minutes',
    'Feel free to adjust the seasoning and serve with your favorite dipping sauce.'
);
INSERT INTO recipes (title, description, photo, ingredients, directions, servings, prep_time_value, prep_time_unit, cook_time_value, cook_time_unit, total_time, notes)
VALUES (
    'Bak Kut Teh',
    'A hearty and aromatic Chinese soup made with pork ribs and a variety of herbs and spices.',
    'bakkuteh.',
    'Pork ribs, garlic cloves, dried shiitake mushrooms, dried goji berries, dried red dates, star anise, cinnamon stick, white peppercorns, cloves, rock sugar, dark soy sauce, light soy sauce, salt, water',
    '1. Rinse the pork ribs under cold water and blanch them in boiling water for a few minutes to remove impurities. Drain and set aside.
     2. In a large pot, combine the blanched pork ribs, garlic cloves, dried shiitake mushrooms, dried goji berries, dried red dates, star anise, cinnamon stick, white peppercorns, cloves, rock sugar, dark soy sauce, light soy sauce, and salt.
     3. Add enough water to cover all the ingredients in the pot. Bring the mixture to a boil over high heat.
     4. Once boiling, reduce the heat to low and let the soup simmer for about 1.5 to 2 hours, or until the pork ribs are tender and the flavors are well infused.
     5. Taste and adjust seasoning if necessary.
     6. Serve the Bak Kut Teh hot with steamed rice or fried dough fritters (you tiao) on the side.',
    '4-6',
    '20',
    'minutes',
    '1.5-2',
    'hours',
    '2 hours 20 minutes',
    'Feel free to add or adjust the herbs and spices according to your taste preferences. Traditionally served with steamed rice or you tiao (Chinese fried dough fritters).'
);
